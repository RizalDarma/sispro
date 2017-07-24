 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
 <html lang="en">
 <head>
      <meta charset="utf-8">
      <title><?php echo $title ?></title>
 </head>
 
 <body>
      <main>
           <div class="right_col" role="main">
            <?php if(isset($contents)){echo $contents;}?>
        </div>
      </main>
 </body>
 </html>