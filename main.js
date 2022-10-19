jQuery(function(){
// premier affichage de la page
    $(document).ready(function(event){
     
        $.ajax({           
            type: "POST",
            url: "image.php",
            data: 'choix=false' + '&un=' + $('#un').is(":checked") + '&deux=' + $('#deux').is(":checked") + '&trois=' + $('#trois').is(":checked") + '&quatre=' + $('#quatre').is(":checked") + '&cinq=' + $('#cinq').is(":checked") + '&six=' + $('#six').is(":checked") + '&texte=' + $('#texte').val() + '&impact=' + $('#impact').is(":checked") + '&roboto=' + $('#roboto').is(":checked") + '&dancing=' + $('#dancing').is(":checked") + '&silkscreen=' + $('#silkscreen').is(":checked") + '&taille=' + $('#taille').val() + '&couleur=' + $('#couleur').val() + '&x=' + $('#x').val() + '&y=' + $('#y').val(),

            success: function(data)
             {
                $("#captcha_new").hide(data);
                $("#image").html(data);
             }
         });
    return false;
    });
// envoi du formulaire à chaque appui du clavier
    $('.test').keyup(function(event){
     
        $.ajax({           
            type: "POST",
            url: "image.php",
            data: 'choix=false' + '&un=' + $('#un').is(":checked") + '&deux=' + $('#deux').is(":checked") + '&trois=' + $('#trois').is(":checked") + '&quatre=' + $('#quatre').is(":checked") + '&cinq=' + $('#cinq').is(":checked") + '&six=' + $('#six').is(":checked") + '&texte=' + $('#texte').val() + '&impact=' + $('#impact').is(":checked") + '&roboto=' + $('#roboto').is(":checked") + '&dancing=' + $('#dancing').is(":checked") + '&silkscreen=' + $('#silkscreen').is(":checked") + '&taille=' + $('#taille').val() + '&couleur=' + $('#couleur').val() + '&x=' + $('#x').val() + '&y=' + $('#y').val(),

            success: function(data)
             {
                // $("#lien").hide(data);
                $("#image").html(data);
             }
         });
    return false;
    });
// envoi du formulaire à chaque clique de la souris    
    $('.test').click(function(event){
     
      $.ajax({           
            type: "POST",
            url: "image.php",
            data: 'choix=false' + '&un=' + $('#un').is(":checked") + '&deux=' + $('#deux').is(":checked") + '&trois=' + $('#trois').is(":checked") + '&quatre=' + $('#quatre').is(":checked") + '&cinq=' + $('#cinq').is(":checked") + '&six=' + $('#six').is(":checked") + '&texte=' + $('#texte').val() + '&impact=' + $('#impact').is(":checked") + '&roboto=' + $('#roboto').is(":checked") + '&dancing=' + $('#dancing').is(":checked") + '&silkscreen=' + $('#silkscreen').is(":checked") + '&taille=' + $('#taille').val() + '&couleur=' + $('#couleur').val() + '&x=' + $('#x').val() + '&y=' + $('#y').val(),

          success: function(data)
           {
                // $("#lien").hide(data);
                $("#image").html(data);
           }
       });
    return false;
    });
// générer le lien pour la première fois
    $('#generer').click(function(event){
     
        $.ajax({           
              type: "POST",
              url: "image.php",
              data: 'choix=true' + '&captcha_reponse=' + $('#captcha_reponse').val() + '&un=' + $('#un').is(":checked") + '&deux=' + $('#deux').is(":checked") + '&trois=' + $('#trois').is(":checked") + '&quatre=' + $('#quatre').is(":checked") + '&cinq=' + $('#cinq').is(":checked") + '&six=' + $('#six').is(":checked") + '&texte=' + $('#texte').val() + '&impact=' + $('#impact').is(":checked") + '&roboto=' + $('#roboto').is(":checked") + '&dancing=' + $('#dancing').is(":checked") + '&silkscreen=' + $('#silkscreen').is(":checked") + '&taille=' + $('#taille').val() + '&couleur=' + $('#couleur').val() + '&x=' + $('#x').val() + '&y=' + $('#y').val(),

  
            success: function(data)
             {
                  $("#captcha_back").hide(data);
                  $("#lien").html(data);
                  $("#captcha_new").show(data);
             }
         });
      return false;
      });
// générer le lien pour les fois suivantes
      $('#generer2').click(function(event){
     
        $.ajax({           
              type: "POST",
              url: "image.php",
              data: 'choix=true' + '&captcha_reponse2=' + $('#captcha_reponse2').val() + '&un=' + $('#un').is(":checked") + '&deux=' + $('#deux').is(":checked") + '&trois=' + $('#trois').is(":checked") + '&quatre=' + $('#quatre').is(":checked") + '&cinq=' + $('#cinq').is(":checked") + '&six=' + $('#six').is(":checked") + '&texte=' + $('#texte').val() + '&impact=' + $('#impact').is(":checked") + '&roboto=' + $('#roboto').is(":checked") + '&dancing=' + $('#dancing').is(":checked") + '&silkscreen=' + $('#silkscreen').is(":checked") + '&taille=' + $('#taille').val() + '&couleur=' + $('#couleur').val() + '&x=' + $('#x').val() + '&y=' + $('#y').val(),

  
            success: function(data)
             {
                //   $("#captcha_back").hide(data);
                  $("#lien").html(data);
                //   $("#captcha_new").show(data);
             }
         });
      return false;
      });
      
    
    
    });