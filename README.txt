Il est nécessaire de faire quelques changements dans le php.ini:
-commenter dans [mail function] la ligne "SMTP ="
-commenter dans [mail function] la ligne "smtp_port ="
-commenter dans [mail function] la ligne "sendmail_from ="
-mettre le chemin du sendmail.exe à la ligne sendmail_path dans [mail function]; ici cela donne:
sendmail_path ="C:\wamp\www\GoldenWings\sendmail\sendmail.exe -t"