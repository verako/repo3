  <div class="container-fluid hed">
      <br>
      <div class="row">
        <div class="left col-lg-1  col-md-1 ">
        </div>
        <div class="left col-lg-5  col-md-5 col-sm-12 col-xs-12">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                  <li data-target="#myCarousel" data-slide-to="4"></li>
                  <li data-target="#myCarousel" data-slide-to="5"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="images/1/1.jpg" alt="tur" width="460" height="300">
                  </div>
                  <div class="item">
                    <img src="images/1/2.jpg" alt="tur" width="460" height="300">
                  </div>
                  <div class="item">
                    <img src="images/1/3.jpg" alt="tur" width="460" height="300">
                  </div>
                  <div class="item">
                    <img src="images/1/4.jpg" alt="tur" width="460" height="300">
                  </div>
                  <div class="item">
                    <img src="images/1/5.jpg" alt="tur" width="460" height="300">
                  </div>
                  <div class="item">
                    <img src="images/1/6.jpg" alt="tur" width="460" height="300">
                  </div>
                </div>
          </div>
        </div>
        <div class="left col-lg-5  col-md-5 col-sm-12 col-xs-12">
          <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Новости
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Акции
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    Скоро в продаже
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
  </div>
  <div class="container marketing">
     <div class="row">
        
        <form action="index.php?page=1" method="post" name='f1'>
            <?php 
            include_once('pages/lists.html');
            $items=array();
            if (isset($_GET['subid'])) {
               $items=Item::GetItems($_GET['subid']);
            }
            else
            $items=Item::GetItems();

            if (isset($_GET['min'],$_GET['max'])) {
             $min=$_GET['min'];
             $max=$_GET['max'];
            }
            foreach ($items as $i) {
              if ($i->GetPrice()<$min||$i->GetPrice()>$max) {
               continue;
              }
              $i->Draw();
            }
          ?>
       </form>
        <?php 
          $reguser='';
          if (!isset($_SESSION['reg']) || $_SESSION['reg']=='') 
          {
            $reguser='cart';
          }
          else
          {
            $reguser=$_SESSION['reg'];
          }

          foreach ($_REQUEST as $k => $v) 
          {
            if (substr($k,0,4) =='cart')  
            {
              $iid=substr($k,4);
              echo '<script>document.cookie="'.$reguser.'_'.$iid.'='.$iid.'";</script>';
            }
          }
        ?>
        <script>
        function getsubid(subid){
          document.location='index.php?page=1&subid='+subid;
        }
        //in jQuery
        //document.location='index.php?page=1&min='+hhh+'&max='+xxx;
        </script>
      
     </div>
  </div> <!-- /container -->
   