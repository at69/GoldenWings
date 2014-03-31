Pour plus d'informations, visitez cette page:
http://beta.alban-truc.fr/work/goldenwings

Il est n�cessaire de faire quelques changements dans le php.ini:
-commenter dans [mail function] la ligne "SMTP ="
-commenter dans [mail function] la ligne "smtp_port ="
-commenter dans [mail function] la ligne "sendmail_from ="
-mettre le chemin du sendmail.exe � la ligne sendmail_path dans [mail function]; ici cela donne:
sendmail_path ="C:\wamp\www\GoldenWings\sendmail\sendmail.exe -t"