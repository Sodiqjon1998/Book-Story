<?php
use yii\helpers\Url;
use common\models\Contact;
use common\models\User;
use common\models\Order;
use common\models\Reviews;

$contact = Contact::find()->all();
$user = User::find()->all();
$order = Order::find()->where(['status' => 1])->all();
$reviews = Reviews::find()->where(['status' => 1])->all();

$counter = 0;

foreach($contact as $item){
    $counter +=1;
}

$_SESSION['counterContact'] = $counter;

$counterUser = 0;

foreach($user as $item){
    $counterUser +=1;
}

$_SESSION['counterUser'] = $counterUser;


$counterOrder = 0;

foreach($order as $item){
    $counterOrder +=1;
}

$_SESSION['counterOrder'] = $counterOrder;

$counterReviews = 0;

foreach($reviews as $item){
    $counterReviews +=1;
}

$_SESSION['counterReviews'] = $counterReviews;

// $this->title = 'My Yii Application';
?>
<!-- Main content -->
<section class="content">

    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$_SESSION['counterUser'];?></h3>

                    <p>Foydalanuvchilar Soni</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?=Url::to(['user/index']);?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$_SESSION['counterOrder'];?></h3>

              <p>Buyurtmalar Soni</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?=Url::to(['order/index']);?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$_SESSION['counterContact'];?></h3>

              <p>Contactlar</p>
            </div>
            <div class="icon">
              <i class="fa fa-comments-o"></i>
            </div>
            <a href="<?=Url::to(['contact/index']);?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$_SESSION['counterReviews'];?></h3>

              <p>Maxsulot izohlari</p>
            </div>
            <div class="icon">
              <i class="fa fa-comment"></i>
            </div>
            <a href="<?=Url::to(['reviews/index']);?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Buyurtmalar Jadvali</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Mujoz</th>
                  <th>Viloyat</th>
                  <th>Tuman</th>
                  <th>Qishloq</th>
                  <th>Telefon</th>
                  <th>Umumiy Summasi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($order as $item):?>
                    <tr>
                        <td style="width: 220px;"><?=$item->user->username;?></td>
                        <td>
                            <?=$item->address->region->name_uz;?>
                        </td>
                        <td><?=$item->address->district->name_uz;?></td>
                        <td> <?=$item->address->quarters->name;?></td>
                        <td><?=$item->address->phone;?></td>
                        <td>
                          <p class="btn-primary" style="padding: 7px; font-size: 17px; font-family: sans-serif;">$ <?=$item->total_sum;?></p>
                        </td>
                    </tr>  
                <?php endforeach;?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        
    </div>
    <!-- /.row -->
    
</section>
