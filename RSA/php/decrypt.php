<?php
//java传过来的用私钥加密的字符串
$private_encrypted = "R/v0pbPH13hqwk/jtT5zM0HSHf7UaCnoETqXXRN7Hebq3uPX3pw0e8YV8+Xtx/26OwL9rvV0ldI9Rqm9x8KlCiK/yGIckoY6sOmgN1vvNedxqk2533Gr18Ad/lgITsjrbD9N0qt2wtk8tZOKZgMY9BB/gXNPF6VDBXpKSXtWgCfFm/22PpftIOYZwji7IvvQ3ikn7rwQ+t5Q4co+nyPdq7QM6W5Ccg1fK5i3hKQWUx9w5iTZlDfQS61hioYXx3ZRu6YjqBWSpKg4GX/RPnqApzjddIzECRA3CM3DnaepRwTb/WuCflBcjcfQl1AJJGqpIh7W/NGTW60xbKErj3d8pQ==";

//java传过来的用公钥加密的字符串
$public_encrypted = "oc2ehSZILhihg7E0TW+YGHr40uHEs24F2u4gt+J+j+7wKj5iuPq0yjHQCRzCYZE9jw3/jh0QN5xlgOWx2c741JZbCqNNTSE2MmytJKvlAwi4Q5qOMhkRsh2qLgECFCp8bZdQYTZQTRpUXFjvJZo0sonzqQ3hAuhwXINEMy2WxcegwyR4BG4WEqoV2IRH9/b0SkL3h6Xr2luVZnr7PxPq9WPWdYl0ZBNIlShX+krxUY7AU28MLx8jG9WP+Mxmw5zweff/83kPmBsrKHyd+mMH4AA6VI+ZuhWrmD2vPBBLrMxnzJhRSxte41DAUkJTQ+M5e/CevtYqN7wijHC6uKUBbw==";


//公钥
$public_key = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4LU8esq8u8rxlBqmZtpz
GtlQkAzGsvB07ZyRY3xf80Fiq3N1d/Nw7buf9GPAxm+PvFCJ2aJr66l70RnyLLo8
uFU9tChZnNhUfWMr7z6Nug1jIHTmWnDe57hAYV+QQGBS+xgh/U3fBtCeH70oVGj0
yUeUE9rEc5lBWfFyE6l6KcWXq5AQMbELOzbCyo/YLS5kyUcv746JxWFNegFIjwo0
ZzGM3ZzFdICEm59JSrwjD77/QUwml1AKnlhG8LVSjETpmdneJXgZWy2x1mp+QHCh
G7TIcozH1bCGCQgOuVP0hFPgaUIDZnkEF5as4s5yEEgNoDNkzTI9w0Es394G/ugR
XQIDAQAB";

//私钥
$private_key = "MIIEpAIBAAKCAQEA4LU8esq8u8rxlBqmZtpzGtlQkAzGsvB07ZyRY3xf80Fiq3N1
d/Nw7buf9GPAxm+PvFCJ2aJr66l70RnyLLo8uFU9tChZnNhUfWMr7z6Nug1jIHTm
WnDe57hAYV+QQGBS+xgh/U3fBtCeH70oVGj0yUeUE9rEc5lBWfFyE6l6KcWXq5AQ
MbELOzbCyo/YLS5kyUcv746JxWFNegFIjwo0ZzGM3ZzFdICEm59JSrwjD77/QUwm
l1AKnlhG8LVSjETpmdneJXgZWy2x1mp+QHChG7TIcozH1bCGCQgOuVP0hFPgaUID
ZnkEF5as4s5yEEgNoDNkzTI9w0Es394G/ugRXQIDAQABAoIBAQCT9aJiNDZ77RCO
9dFV7kdWiXtrro3zazOC9dIh0NaZJRekTz0tA4X7c8zKLhjUUMczN1Ddlf47yXh2
4f+9hc/PjIk5pEwFY8iWW4OlX+oQdRotV+wJ50JPD9qMg1FHomVhYq2Wzfypzxof
Sf1RP17XXiNZw3YRq/sFD1+PJMwEzhO1Gn2ZaBbTeo0timX6pVE4eUDrQRNushwq
svrquvaG7AzlaN8UecJxT91bMcjIlaGQ410MhZl+288jxSPsKVp+ssY1ulLlH/0I
xg+/5xeh5sXigQ6NeEWtZ6lnbC2yzoPrqgMMEC4k2fOye/kWJEuOmlXw/TQcD4ph
pUd+uZlhAoGBAPVeZ4od2ZblBXZXgPrgxN3oG5HJsfEsXMRcRltxB4jE333fdRX3
Ht6viOtU84SFtWRV8QFUMnJQFzkoaUMFVKU5oPCLVugQJhSY97H903Cf7778refO
vzk6o94TMr6/wt4OWF4LnfxH+hWR7amrkCF0Qec/G1BSvz/RhxCoPG1lAoGBAOpx
qjyrvHLo2D5oLjtWm7QoH/DFZTJp8OmAKlCcY33FggvyXmci62YDI4bquZGoZyVi
S3RsrhDrjKNnzKKMKEtmRZUbFCG2RSNTOcLJUk7GNO9NjG63LUUDUvCXMcjNTbbB
+3TmFlLLy+2foF2ZGV6epweorv3aUczG3k8FjPCZAoGAR1hb4t0rF6UgIXjwGAKj
O6Lx4UI0a1vq3W23R39mIW6dTYxcDzb70uRXe5YH+NCoHbSfjzNcN8Dx/7ywXrx+
EEzhbxAVBQUtDXAtFaQohub6Xx45st163LkgTMJoTu6TSt4A89eM6H5FSWBVKrCo
CBI113eSCZkF4xiZnU5Nw8ECgYBz8lsbPmQpAHdSBfw3ZJIE+4MwdK+jyzlWgghr
bazW2wOCHRALOf3pqcu8QgIcw4ifuIlQvx8nRxd7CS7vhRm4kJABOi8urRJschCz
ARYv117+qv+1EerVots2GdCJWuAAbteJ7PFFaX0lvDh3kew2G4jIBOjmqz6hZAk2
U6xsoQKBgQCSmpW+3qPhZh1YVEZbd5hU0eLKJM9XESqeTPFesx2hDnbNSHIAn52K
BuOqNPiHLWTwcEcvhulxvm1LY8O+EaaFn3xd0VQsMvPSd9DnQbM0Wgdhiyvk4/GN
lqs68F4XR1/Wf6z+XkkuMpyh/YD4Y4D7RtZZtayfLQ1KgvT4MSgZtQ==";

$public_key = "-----BEGIN PUBLIC KEY-----\n".$public_key."\n-----END PUBLIC KEY-----";

$private_key = "-----BEGIN RSA PRIVATE KEY-----\n".$private_key."\n-----END RSA PRIVATE KEY-----";

//验证公钥
$pu_key = openssl_pkey_get_public($public_key);
//验证私钥
$pi_key =  openssl_pkey_get_private($private_key);
//公钥解密
openssl_public_decrypt(base64_decode($private_encrypted),$public_decrypted,$pu_key);
//私钥解密
openssl_private_decrypt(base64_decode($public_encrypted),$private_decrypted,$pi_key);


echo "\n公钥解密:\n".$public_decrypted;


echo "\n私钥解密:\n".$private_decrypted;

?>