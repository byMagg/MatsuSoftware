<?php
  echo  '
        <style>
        a:hover{
          border: 0;
        }
        </style>
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#000"
            },
            "button": {
              "background": "#f1d600"
            }
          },
          "position": "bottom-right",
          "content": {
            "message": "Esta página web usa cookies para ofrecer la mejor experiencia al usuario.",
            "dismiss": "Aceptar",
            "link": "Leer más"
          }
        })});
        </script>
        ';
?>