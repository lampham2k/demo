<?php
session_start();
unset($_SESSION['quantitys']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <style type="text/css">
      .search {
        width: 100%;
        display: block;
        padding: 1em;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border: 1px solid black;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        outline: none;
      }
    </style>
</head>
<body>
    <div id="page">
    <?php include 'header.php';
    require '../connect.php';
    $sql = "select * from products";
    $result = mysqli_query($connect,$sql);
    ?>
    <div id="content">
    <section class="o-main-section">
        <h1 class="c-main-heading">DANH SÁCH SẢN PHẨM</h1>
        <div class="ui-widget">
            <img
                id="project-icon"
                src="images/transparent_1x1.png"
                class="ui-state-default"
                alt
            />
            <input id="project" class="search" placeholder="Search product" />
            <input type="hidden" id="project-id" />
        </div>
        <?php foreach($result as $each): ?>
        <article class="c-article">
        <a class="c-article__link" href="product_detail.php?id=<?php echo $each['id'];?>">
            <div>
            <header>
                <h3 class="c-article__heading"><?php echo $each['name']; ?></h3>
            </header>
            <div class="c-article__content">
                <?php echo $each['description']; ?>
            </div>
            </div>
            <div class="c-article__img-wrapper">
            <img class="c-article__img" src="../admin/product/photos/<?php echo $each['photo']; ?>" alt="Ink transition with PNG sprite" />
            </div>
        </a>
        </article>
        <?php endforeach ?>
    </section>
    </main>

    <div class="c-author">
    Cảm ơn bạn vì đã ghé thăm 💛 &nbsp;
    </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script src="../index.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $("#project")
          .autocomplete({
            minLength: 0,
            source: "search.php",
            focus: function (event, ui) {
              $("#project").val(ui.item.label);
              return false;
            },
            // select: function (event, ui) {
            //   $("#project").val(ui.item.label);
            //   $("#project-id").val(ui.item.value);
            //   $("#project-icon").attr(
            //     "src",
            //     "../admin/product/photos/" + ui.item.photo
            //   );

            //   return false;
            // },
          })
          .autocomplete("instance")._renderItem = function (ul, item) {
          return $("<li>")
            .append(
              `<div>
                    ${item.label}
                    <br>
                    <img src="../admin/product/photos/${item.photo}" height='50'>
                    `
            )
            .appendTo(ul);
        };
      });
    </script>
</body>
</html>