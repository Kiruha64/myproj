<?php ?>

<div class="row">
    <div class="col-md-9">
        <div class="container marketing">
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                    <h4>User: <?= $user->name ?></h4>
                    <p>Email: <?= $user->email?></p>


<!--                    <p><a class="btn btn-secondary" href="#">View details »</a></p>-->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

        </div>

    </div>
</div>
<?= $this->Html->link('Logout',['action'=>'logout'],['class'=>'btn btn-info'])?>

