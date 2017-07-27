     <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                
              <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" id="navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('search')."..."?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        

                        <li>
                            <a href="<?php echo base_url();?>main"><i class="fa fa-bar-chart-o"></i> <?php echo $this->lang->line('menu0');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>category"><i class="glyphicon glyphicon-list"></i> <?php echo $this->lang->line('menu1');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>brand"><i class="glyphicon glyphicon-tags"></i> <?php echo $this->lang->line('menu2');?></a>
                        </li>
                       
                        <li>
                            <a href="#"><i class="fa fa-users"></i> <?php echo $this->lang->line('menu3');?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/member_c"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->lang->line('menu3');?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>account"><i class="glyphicon glyphicon-flash"></i><?php echo $this->lang->line('menu8');?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>product"><i class="glyphicon glyphicon-list-alt"></i> <?php echo $this->lang->line('menu4');?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>Store"><i class="glyphicon glyphicon-modal-window"></i> <?php echo $this->lang->line('menu7');?></a>
                                </li>
                        
                               <!--  <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    /.nav-third-level
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>inventory"><i class="glyphicon glyphicon-list-alt"></i> <?php echo $this->lang->line('menu17');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/wallet_c"><i class="glyphicon glyphicon-credit-card"></i> <?php echo $this->lang->line('menu6');?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url();?>location"><i class="glyphicon glyphicon-send"></i> <?php echo $this->lang->line('menu9');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>stock"><i class="glyphicon glyphicon-copy"></i> <?php echo $this->lang->line('menu10');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/promotion_c"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->lang->line('menu18');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/user_controller"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->lang->line('menu11');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>order"><i class="glyphicon glyphicon-transfer"></i> <?php echo $this->lang->line('menu12');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>advertise"><i class="glyphicon glyphicon-tags"></i> <?php echo $this->lang->line('menu13');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/blogController"><i class="glyphicon glyphicon-bookmark"></i> <?php echo $this->lang->line('menu14');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>admin/slide_c"><i class="glyphicon glyphicon-picture"></i> <?php echo $this->lang->line('menu5');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/marqueeController"><i class="glyphicon glyphicon-text-size"></i> <?php echo $this->lang->line('menu15');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/Template_c"><i class="fa fa-columns" aria-hidden="true"></i> <?php echo $this->lang->line('menu16');?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
   </nav>