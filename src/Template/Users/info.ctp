<p>User id: <?= $userid ?></p>
<p>User name: <?= $username ?></p>
<p>User role: <?= $userrole ?></p>
<p>created time: <?= $usercreated ?></p>

<p>
    <?= $this->Html->link('New Password', ['controller'=> 'Users','action' => 'newpassword',$userid]); ?>
</p>

<p>
    <?= $this->Html->link('Logout', ['controller'=> 'Users','action' => 'logout']); ?>
</p>

<!--debug($us->username)-->


