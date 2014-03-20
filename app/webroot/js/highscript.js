$(function(){
        $('area').click(function(){
           var co = $(this).attr('coords');
           var id = $(this).attr('id');
           id = id.replace('star','');
           var nu = parseFloat(id);
           var i1 = $('.front').val();
           var i2 = $('.back').val();
           var i3 = $('.side').val();
           if(nu<13)
           {
             if(i1.replace(co,'') != i1){
             i1 = i1.replace(co+'_','');
             i1 = i1.replace('_'+co,'');
             i1 = i1.replace(co,'');
             }
             else
             {
             if(i1!='')   
             i1 = i1+'_'+co;
             else
             i1 = co;
             }
             $('.front').val(i1);
             
           }
           else
           if(nu<25)
           {
             if(i2.replace(co,'') != i2){
             i2 = i2.replace(co+'_','');
             i2 = i2.replace('_'+co,'');
             i2 = i2.replace(co,'');
             }
             else{
             if(i2!='')   
             i2 = i2+'_'+co;
             else
             i2 = co;
             }
             $('.back').val(i2);
             
           }
           else
           if(nu<50)
           {
             if(i3.replace(co,'') != i3){
             i3 = i3.replace(co+'_','');
             i3 = i3.replace('_'+co,'');
             i3 = i3.replace(co,'');
             }
             else{
             if(i3!='')   
             i3 = i3+'_'+co;
             else
             i3 = co;
             }
             $('.side').val(i3);
             
           } 
        });
        $('#star1').click(function(e) {
            e.preventDefault();
            var data = $('#star1').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star1').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star2').click(function(e) {
            e.preventDefault();
            var data = $('#star2').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star2').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star3').click(function(e) {
            e.preventDefault();
            var data = $('#star3').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star3').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star4').click(function(e) {
            e.preventDefault();
            var data = $('#star4').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star4').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star5').click(function(e) {
            e.preventDefault();
            var data = $('#star5').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star5').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star6').click(function(e) {
            e.preventDefault();
            var data = $('#star6').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star6').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star7').click(function(e) {
            e.preventDefault();
            var data = $('#star7').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star7').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star8').click(function(e) {
            e.preventDefault();
            var data = $('#star8').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star8').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star9').click(function(e) {
            e.preventDefault();
            var data = $('#star9').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star9').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star10').click(function(e) {
            e.preventDefault();
            var data = $('#star10').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star10').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star11').click(function(e) {
            e.preventDefault();
            var data = $('#star11').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star11').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star12').click(function(e) {
            e.preventDefault();
            var data = $('#star12').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star12').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star13').click(function(e) {
            e.preventDefault();
            var data = $('#star13').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star13').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star14').click(function(e) {
            e.preventDefault();
            var data = $('#star14').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star14').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star15').click(function(e) {
            e.preventDefault();
            var data = $('#star15').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star15').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star16').click(function(e) {
            e.preventDefault();
            var data = $('#star16').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star16').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star17').click(function(e) {
            e.preventDefault();
            var data = $('#star17').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star17').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star18').click(function(e) {
            e.preventDefault();
            var data = $('#star18').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star18').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star19').click(function(e) {
            e.preventDefault();
            var data = $('#star19').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star19').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star20').click(function(e) {
            e.preventDefault();
            var data = $('#star20').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star20').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star21').click(function(e) {
            e.preventDefault();
            var data = $('#star21').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star21').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star22').click(function(e) {
            e.preventDefault();
            var data = $('#star22').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star22').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star23').click(function(e) {
            e.preventDefault();
            var data = $('#star23').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star23').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star24').click(function(e) {
            e.preventDefault();
            var data = $('#star24').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star24').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        
        
        $('#star33').click(function(e) {
            e.preventDefault();
            var data = $('#star33').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star33').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star34').click(function(e) {
            e.preventDefault();
            var data = $('#star34').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star34').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star35').click(function(e) {
            e.preventDefault();
            var data = $('#star35').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star35').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star36').click(function(e) {
            e.preventDefault();
            var data = $('#star36').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star36').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star37').click(function(e) {
            e.preventDefault();
            var data = $('#star37').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star37').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star38').click(function(e) {
            e.preventDefault();
            var data = $('#star38').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star38').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star39').click(function(e) {
            e.preventDefault();
            var data = $('#star39').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star39').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star40').click(function(e) {
            e.preventDefault();
            var data = $('#star40').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star40').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star41').click(function(e) {
            e.preventDefault();
            var data = $('#star41').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star41').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star42').click(function(e) {
            e.preventDefault();
            var data = $('#star42').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star42').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star43').click(function(e) {
            e.preventDefault();
            var data = $('#star43').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star43').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        $('#star44').click(function(e) {
            e.preventDefault();
            var data = $('#star44').mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $('#star44').data('maphilight', data).trigger('alwaysOn.maphilight');
        });
        });