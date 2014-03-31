$(function(){
        $('area').click(function(){
           var co = $(this).attr('coords');
           var id = $(this).attr('id');
           //alert(id);
           if(id.replace('star_')!=id)
           nu=1;
           else
           if(id.replace('star2_')!=id)
           nu=2;
           else
           if(id.replace('star3_')!=id)
           nu=3;
           //id = id.replace('star','');
           //var nu = parseFloat(id);
           var i1 = $('.front').val();
           var i2 = $('.back').val();
           var i3 = $('.side').val();
           if(nu==1)
           {
             var noten = 'Note for '+id.replace('star_','');
             if(i1.replace(co,'') != i1){
             i1 = i1.replace(co+'_','');
             i1 = i1.replace('_'+co,'');
             i1 = i1.replace(co,'');
             co2 = co.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             
             $('.firsthidden input').each(function(){
                if($(this).attr('class')==co2)
                {
                  
                  $('.'+co2).remove();  
                }
             });
             
             }
             else
             {
             if(i1!='')   
             i1 = i1+'_'+co;
             else
             i1 = co;
              co2 = co.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             $('.firsthidden').append(noten+'<br/><input type="text" name="desc1[]" style="width:90%;margin:5px 0;" id="first'+id.replace('star_','')+'" class="'+co2+'" placeholder="Note" /><br/><br/>');
             }
             $('.front').val(i1);
             if(i1)
             {
                $('.firsthidden').show();
             }
             else
             $('.firsthidden').hide();
             
           }
           else
           if(nu==2)
           {
             var noten = 'Note for '+id.replace('star2_','');
             if(i2.replace(co,'') != i2){
             i2 = i2.replace(co+'_','');
             i2 = i2.replace('_'+co,'');
             i2 = i2.replace(co,'');
             co2 = co.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             
             $('.secondhidden input').each(function(){
                if($(this).attr('class')==co2)
                {
                  
                  $('.'+co2).remove();  
                }
             });
             }
             else{
             if(i2!='')   
             i2 = i2+'_'+co;
             else
             i2 = co;
             co2 = co.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             $('.secondhidden').append(noten+'<br/><input type="text" name="desc2[]" style="width:90%;margin:5px 0;" id="second'+id.replace('star2_','')+'" class="'+co2+'" placeholder="Note" /><br/><br/>');
             }
             $('.back').val(i2);
             if(i2)
             {
                $('.secondhidden').show();
             }
             else
             $('.secondhidden').hide();
             
           }
           else
           if(nu==3)
           {
            var noten = 'Note for '+id.replace('star3_','');
             if(i3.replace(co,'') != i3){
             i3 = i3.replace(co+'_','');
             i3 = i3.replace('_'+co,'');
             i3 = i3.replace(co,'');
             co2 = co.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             
             $('.thirdhidden input').each(function(){
                if($(this).attr('class')==co2)
                {
                  
                  $('.'+co2).remove();  
                }
             });
             }
             else{
             if(i3!='')   
             i3 = i3+'_'+co;
             else
             i3 = co;
             co2 = co.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             co2 = co2.replace(',','_');
             $('.thirdhidden').append(noten+'<br/><input type="text" name="desc3[]" style="width:90%;margin:5px 0;" id="third'+id.replace('star3_','')+'" class="'+co2+'" placeholder="Note" /><br/><br/>');
             }
             $('.side').val(i3);
             if(i3)
             {
                $('.thirdhidden').show();
             }
             else
             $('.thirdhidden').hide();
             
           } 
        });
        $('area').click(function(e){
            var  id = $(this).attr('id');
            e.preventDefault();
            var data = $('#'+id).mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#'+id).data('maphilight', data).trigger('alwaysOn.maphilight');
        });/*
        $('#star_1').click(function(e) {
            e.preventDefault();
            var data = $('#star_1').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_1').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_2').click(function(e) {
            e.preventDefault();
            var data = $('#star_2').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_2').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_3').click(function(e) {
            e.preventDefault();
            var data = $('#star_3').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_3').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_4').click(function(e) {
            e.preventDefault();
            var data = $('#star_4').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_4').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_5').click(function(e) {
            e.preventDefault();
            var data = $('#star_5').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_5').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_6').click(function(e) {
            e.preventDefault();
            var data = $('#star_6').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_6').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_7').click(function(e) {
            e.preventDefault();
            var data = $('#star_7').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_7').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_8').click(function(e) {
            e.preventDefault();
            var data = $('#star_8').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_8').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_9').click(function(e) {
            e.preventDefault();
            var data = $('#star_9').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_9').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_10').click(function(e) {
            e.preventDefault();
            var data = $('#star_10').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_10').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_11').click(function(e) {
            e.preventDefault();
            var data = $('#star_11').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_11').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star_12').click(function(e) {
            e.preventDefault();
            var data = $('#star_12').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star_12').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_1').click(function(e) {
            e.preventDefault();
            var data = $('#star2_1').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_1').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_2').click(function(e) {
            e.preventDefault();
            var data = $('#star2_2').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_2').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        
        $('#star2_3').click(function(e) {
            e.preventDefault();
            var data = $('#star2_3').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_3').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_4').click(function(e) {
            e.preventDefault();
            var data = $('#star2_4').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_4').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_5').click(function(e) {
            e.preventDefault();
            var data = $('#star2_5').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_5').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_6').click(function(e) {
            e.preventDefault();
            var data = $('#star2_6').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_6').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_7').click(function(e) {
            e.preventDefault();
            var data = $('#star2_7').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_7').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_8').click(function(e) {
            e.preventDefault();
            var data = $('#star2_8').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_8').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_9').click(function(e) {
            e.preventDefault();
            var data = $('#star2_9').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_9').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_10').click(function(e) {
            e.preventDefault();
            var data = $('#star2_10').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_10').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2_12').click(function(e) {
            e.preventDefault();
            var data = $('#star2_12').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_12').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        
        
        $('#star2_11').click(function(e) {
            e.preventDefault();
            var data = $('#star2_11').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2_11').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_1').click(function(e) {
            e.preventDefault();
            var data = $('#star3_1').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_1').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_2').click(function(e) {
            e.preventDefault();
            var data = $('#star3_2').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_2').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_3').click(function(e) {
            e.preventDefault();
            var data = $('#star3_3').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_3').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_4').click(function(e) {
            e.preventDefault();
            var data = $('#star3_4').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_4').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_5').click(function(e) {
            e.preventDefault();
            var data = $('#star3_5').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_5').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_6').click(function(e) {
            e.preventDefault();
            var data = $('#star3_6').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_6').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_7').click(function(e) {
            e.preventDefault();
            var data = $('#star3_7').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_7').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_8').click(function(e) {
            e.preventDefault();
            var data = $('#star3_8').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_8').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_9').click(function(e) {
            e.preventDefault();
            var data = $('#star3_9').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_9').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_10').click(function(e) {
            e.preventDefault();
            var data = $('#star3_10').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_10').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_11').click(function(e) {
            e.preventDefault();
            var data = $('#star3_11').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_11').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3_12').click(function(e) {
            e.preventDefault();
            var data = $('#star3_12').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3_12').data('maphilight', data).trigger('alwaysOn.maphilight');
        });*/
        });
        function vehicle_test()
        {
            if($('#document_type').val()=='vehicle_inspection')
            {
                $('.sbtbtn').val('Please Wait..');
                $('.sbtbtn').attr('disabled','disabled');
                $('.firsthidden input').each(function(){
                   var note = $(this).attr('id').replace('first',''); 
                   var coor = $(this).attr('class');
                   var coor = coor.replace(' valid','');
                   var val =  $(this).val();
                   $(this).val(val+'__'+coor+'__'+note);
                   alert($(this).val());
                   //return false;
                });
                $('.thirdhidden input').each(function(){
                   var note = $(this).attr('id').replace('third',''); 
                   var coor = $(this).attr('class');
                   var coor = coor.replace(' valid','');
                   var val =  $(this).val();
                   $(this).val(val+'__'+coor+'__'+note);
                });
                $('.secondhidden input').each(function(){
                   var note = $(this).attr('id').replace('second',''); 
                   var coor = $(this).attr('class');
                   var coor = coor.replace(' valid','');
                   var val =  $(this).val();
                   $(this).val(val+'__'+coor+'__'+note);
                });
                return true;
            }
            else
            return true;
        }