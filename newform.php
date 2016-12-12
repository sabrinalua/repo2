<?php
//for dynamically addable and removable input

// Yii::app()->clientScript->registerScript('multi', "
// 	$('.multi-button').click(function(){
// 		$('.input_fields_wrap').toggle();
// 			return false;
// 	});");

// Yii::app()->clientScript->registerScript('recur', "
// 	$('.recur-button').click(function(){
// 		$('.input_fields_wrap').hide();
// 			return false;
// 	});");

?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'new-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo CHtml::link('Multiple DateTime','#',array('class'=>'multi-button')); ?>
<?=" || ";?>
<?php echo CHtml::link('Recurring','#',array('class'=>'recur-button')); ?>

<div class="row" >
		<div class="input_fields_wrap" style="display:none">
		<a href="javascript:void(0);" class="add_field_button" onclick="javascript:void(0);">Add Input</a>
				<div>
					<label>From </label>
					<?php echo $form->dateTimeLocalField($model,'starting_datetime[0]'); ?>
					<label>To </label>
					<?php echo $form->dateTimeLocalField($model,'ending_datetime[0]'); ?>
				</div>
		</div>
</div>

<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
</div>
<?php $this->endWidget(); ?>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            console.log(x);
            $(wrapper).append('<div><label>From</label><input type="datetime-local" name="NewForm[starting_datetime][]"/><br><label>To </label><input type="datetime-local" name="NewForm[ending_datetime][]"/><a href="javascript:void(0);" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    $('.multi-button').click(function(){
		$('.input_fields_wrap').toggle();
			return false;
	});

	$('.recur-button').click(function(){
		$('.input_fields_wrap').hide();
			return false;
	});
});
</script>

