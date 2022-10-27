This project is about chat system, which will also be having an encrypting and decrypting option to encrypt the message that will be sent.
So there are certain steps to execute this project and also it is an on going project.
This is project is done upto login system with otp verification and login.
These are the steps :- 
->First create a database named with usersform.
->Now create a table named with users.
->As it is a xampp based project we need to configure some settings of xampp to send otp from a mail to users mail.
->Now login to account.google.com(login with Your mail) , go to security option and on two step authentication.
->Now at same security option we will be having ass password setup. generate a password and make a copy.
->Now move to php config file(xampp(folder)->php->php.config).
->search for mail function using (cntrl + f) , now add semi colons for every line of mail function.
->add this text above of mail function 
              SMTP=smtp.gmail.com
              smtp_port=587
              sendmail_from = mail@gmail.com(your mail)
              sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t
->after this open send mail folder(xampp(folder)->sendmail->sendmail.config)
->search for send mail function using (cntrl + f) , now add semi colons for every line of send mail function.
->add this text below send mail function
              smtp_server=smtp.gmail.com
              smtp_port=587
              error_logfile=error.log
              debug_logfile=debug.log
              auth_username=mail@gmail.com(your mail)
              auth_password=yourpassword(generated password)
              force_sender=mail@gmail.com(your mail)
