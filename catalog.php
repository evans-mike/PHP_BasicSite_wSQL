<?php
include("inc/functions.php");

$pageTitle = "Full Catalog";
$section = null;
$items_per_page = 8;

if (isset($_GET["cat"])) {
    if ($_GET["cat"] == "books") {
        $pageTitle = "Books";
        $section = "books";
    } else if ($_GET["cat"] == "movies") {
        $pageTitle = "Movies";
        $section = "movies";
    } else if ($_GET["cat"] == "music") {
        $pageTitle = "Music";
        $section = "music";
    }
}

if(isset($_GET["pg"]))
  {
    $current_page = filter_input(INPUT_GET,"pg",FILTER_SANITIZE_NUMBER_INT);
  }
  if (empty($current_page))
  {
    $current_page = 1;
  }

  $total_items = get_catalog_count($section);

if (empty($section))
  {
    $catalog = full_catalog_array();
  }
  else
  {
    $catalog = category_catalog_array($section);
  }


include("inc/header.php"); ?>

<div class="section catalog page">

    <div class="wrapper">

        <h1><?php
        if ($section != null) {
            echo "<a href='catalog.php'>Full Catalog</a> &gt; ";
        }
        echo $pageTitle; ?></h1>

        <ul class="items">
            <?php
            foreach ($catalog as $item) {
                echo get_item_html($item);
            }
            ?>
        </ul>

    </div>
</div>

<?php include("inc/footer.php"); ?>
