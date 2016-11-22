#!/bin/bash

#生成模长为1024bit的私钥
openssl genrsa -out private_key.pem 1024
#生成certification require file
openssl req -new -key private_key.pem -out rsaCertReq.csr
#生成certification 并指定过期时间
openssl x509 -req -days 3650 -in rsaCertReq.csr -signkey private_key.pem -out rsaCert.crt
#生成公钥供iOS使用
openssl x509 -outform der -in rsaCert.crt -out public_key.der
#生成私钥供iOS使用 这边会让你输入密码，后期用到在生成secKeyRef的时候会用到这个密码
openssl pkcs12 -export -out private_key.p12 -inkey private_key.pem -in rsaCert.crt
#生成pem结尾的公钥供Java使用
openssl rsa -in private_key.pem -out rsa_public_key.pem -pubout
#生成pkcs8的私钥供Java使用
openssl pkcs8 -topk8 -in private_key.pem -out pkcs8_private_key.pem -nocrypt
#反转pkcs8为rsa私钥
#openssl rsa -in pkcs8_private_key.pem -out rsa_public_key.pem
# 或者  openssl pkcs8 -in pkcs8_private_key.pem -nocrypt -out rsa_public_key.pem

