<?php
//Do not remove below lines
include('config.php') ;
?>
<link href="<?php echo "http://".$_SERVER[HTTP_HOST].dirname($_SERVER['PHP_SELF']); ?>/supform/css/<?php echo"$cssFile[$styleSheet]";?>" rel="stylesheet" type="text/css"><link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<div id="contact">


            <h1><?php echo $contact_form_title; ?></h1>
                        
                        <hr>
                            
                        
                            
            <fieldset>
                        
            <legend>Please fill in the following form to contact us</legend>
                        
                        <?php echo $error[0];?>
            <?php echo $error[10]?>
                        
            <form method="post" action="" id="contact-form">

            <label for="name" accesskey="U">Your Name<?php if($name_required=="Y"){?><span class="required">*</span><?php }?> </label>
                        <span class="input-feild">
                            <i class="fa fa-user fa-2x"></i>
                            <input name="name" id="name" size="30" type="text" value="<?php if($error){ echo $_POST['name'];}?>">
                        </span>
                        <div class="clear"></div>
             <?php echo $error[1];?>
             <?php echo $error[2];?>
        
            

            <br/>
            <label for="email" accesskey="E"> Email<?php if($email_required=="Y"){?><span class="required">*</span><?php }?></label>
                        <span class="input-feild">
                            <i class="fa fa-envelope fa-2x"></i>
                            <input name="email" id="email" size="30" type="text" value="<?php if($error){ echo $_POST['email'];}?>">
                        </span>
                        <div class="clear"></div>
            <?php echo $error[3];?>
             <?php echo $error[4];?>

            <br/>
            
            <label for=phone accesskey=P> Phone<?php if($phone_required=="Y"){?><span class="required">*</span><?php }?></label>
                        <span class="input-feild">
                            <i class="fa fa-phone fa-2x"></i>
                            <input name="phone" type="tel" id="phone" size="30" value="<?php if($error){ echo $_POST['phone'];}?>" />                        </span>
                        <div class="clear"></div>
            <?php echo $error[5];?>
            <?php echo $error[6];?>

            <br />
            
            <label for="Department" accesskey="D">Department<span class="required">*</span></label>

            <?php $array = explode(',', $department_list); 
    
            ?>
                        <span class="input-feild">
                            <i class="fa fa-flag fa-2x"></i>                            
                            <select name="department" id="department">
                                <?php
                                foreach ($array as $item) {
                                echo '<option value="'.$item.'">'.$item.'</option>'; 
                                 }
                                ?>
                            </select>
                        </span>

            <br/>
            
            
            <br/>
            <label for="subject" accesskey="S">Subject<?php if($subject_required=="Y"){?><span class="required">*</span><?php }?></label>
                        <span class="input-feild">
                            <i class="fa fa-pencil fa-2x"></i>
                            <input name="subject" id="subject" size="30" type="text" value="<?php if($error){ echo $_POST['subject'];}?>">                        </span>
                        <div class="clear"></div>
            <?php echo $error[9];?>
            

              <br/>
            
            
           
            <label for="message" accesskey="C">Your message<?php if($message_required=="Y"){?><span class="required">*</span><?php }?> </label>
                        <span class="input-feild textarea">
                            <i class="fa fa-comments-o fa-2x"></i>
                            <textarea name="message" cols="40" rows="3" id="message"><?php if($error){ echo $_POST['message'];}?></textarea><br/>
                        </span>
                        <div class="clear"></div>
            <?php echo $error[7];?>
                                                <div id="captcha">
                                               
                            <p>Are you human?<span class="required">*</span></p>
                           
                             <input name="captcha" id="captcha" size="30" type="text" value="">
                              <input name="confirm" id="confirm"  type="hidden" value="<?php echo $hash;?>">
                              
                              <?php echo "<h2 style='text-transform:none'>".$randomString."</h2>"; ?>




                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        
                        <?php echo $error[11];?>
                        
                        <?php echo $error[8];?>
                        
                        <hr>
                        
                        <span class="submit-wapper">
                            <input name="submit" class="submit" id="contactus" value="Submit your message" type="submit">
                        </span>
                        
            </form>
                        
        </fieldset>
            

            </div>
