(function(self) {
  self.addEventListener('notificationclick', function(event) {
    event.notification.close();
    var data = event.notification.data;
    if (!data) {
      return;
    }
    var url = data.url;
    event.waitUntil(
      self.clients.matchAll({
        type: 'window',
      })
      .then(function(clientList) {
        for (var i = 0; i < clientList.length; i++) {
          if (clientList[i].url === url) {
            return clientList[i].focus();
          }
        }
        var newURL = new URL(url);
        return self.clients.openWindow(newURL);
      })
    );
  });
  var lastNotificationTime = 0;
  self.addEventListener('push', function(event) {
    var data = event.data.json();
    event.waitUntil(
      Promise.resolve()
      .then(function() {
        if (Date.now() < lastNotificationTime + 900) {
          return;
        }
        lastNotificationTime = Date.now();
        self.registration.showNotification(data.title, {
          body: data.message,
          badge: data.badge,
          icon: data.icon,
          data: data,
          renotify: true,
          requireInteraction: true,
          tag: 'notification',
        });
      })
    );
  });
})(self);
