<header>
    <div id="header">
<!--			<h1>Machine Management</h1>-->
			<div class="navbar navbar-fixed-top">    
            	<div class="navbar-inner ">
                <div class="container">
                   <a href="#" class="brand">Survey System</a> 
                   

                       <div class="collapse nav-collapse" >
                           <ul class="nav pull-right">
                               <li class="active"><?php echo $this->Html->link('Settings', array('controller' => 'Settings','action' => 'index'));?></li>
                               <li class="active"><?php echo $this->Html->link('Survey Type', array('controller' => 'OutletTypes','action' => 'index'));?></li>
                               <li><?php //echo $this->Html->link('User Info',array('controller' => 'users', 'action' => 'index'));?></li>
                               <li><?php echo $this->Html->link('Logout',array('controller' => 'users', 'action' => 'logout'));?></li>
                           </ul>
                       </div>      
                </div>
            </div>
        </div>
        <div class="">
                <div class="container">
            
                    <ul class="nav nav-pills">
                        <li class="active">
                        	<?php //echo $this->Html->link('Engineers', array('controller' => 'engineers', 'action' => 'index'));?>
                        </li>
                        <li><?php //echo $this->Html->link('General Work Flow', array('controller' => 'work_details', 'action' => 'index'));?></li>
                        
                    </ul>
                </div>
        </div>
    </div>
</header>