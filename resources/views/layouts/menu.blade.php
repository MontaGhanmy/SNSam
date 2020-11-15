<style>
.searchbar a {display: inline-block;}.searchbar input {display: inline-block;margin-right:10px;}
@media screen and (max-width: 767px) {
.searchbar input {max-width:150px}
}
</style>
<ul class='navbar-nav mx-auto ml-auto'>
    <?php foreach ($menu as $menu_item) {
    ?>

          <?php if (count($menu_item['children']) > 0) {
        ?>
  <li class="nav-item dropdown <?php if (Request::is($menu_item['value'] . '/*')) {
            echo "active";
        } ?>">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{$menu_item['name']}}</a>
    <div class="dropdown-menu">
        <?php foreach ($menu_item['children'] as $item) {
            ?>
          <a class="dropdown-item text-left" target="{{$item['target']}}" href="{{$item['value']}}">{{$item['name']}}</a>

<?php
        } ?>
</div>
<?php
    } else {
        if (strpos($menu_item['value'], "/deconnexion") !== false) {
            ?>
    <li class="nav-item dropdown <?php if (Request::is($menu_item['value'])) {
                echo "active";
            } ?>">
    <a class="nav-link dropdown-toggle pb-2" href="#" data-toggle="dropdown"><img class="d-inline mx-auto" src="{{  Avatar::create(Auth::user()->name)->toBase64()  }}" height="32" /></a>
    <div class="dropdown-menu">
      <a class="dropdown-item text-left" target="{{$menu_item['target']}}" href="<?php echo $menu_item['value']; ?>"> <?php echo $menu_item['name']; ?> </a>
    </div>
</li>
<?php
        } else {
            ?>
<?php if (
    $menu_item['value'] !== "/page/conseil" ||
    ($menu_item['value'] === "/page/conseil" &&
        Auth::user()  && Auth::user()->specialty === "Pharmacie")
) {
                ?>
          <li class="nav-item <?php if (Request::is($menu_item['value'])) {
                    echo "active";
                } ?>">
          <a class="nav-link" target="{{$menu_item['target']}}" href="<?php echo $menu_item['value']; ?>"> <?php echo $menu_item['name']; ?></a>
        <?php
            } ?>
      </li>
    <?php
        }
    } ?>
<?php
} ?>

<li class="searchbar d-none d-lg-block">
  <input class="search mx-auto" type="text" value="" placeholder="Recherche" />
  <a href="javascript:void(0)"><img src="/img/search.png" width="16"  class=" d-flex align-items-center"/></a>
</li>
</ul>
