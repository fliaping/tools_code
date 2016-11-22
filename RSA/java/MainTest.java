public class MainTest { 
	  
		public static void main(String[] args) throws Exception {  
			String filepath="/Users/Payne/Workspace/GitHub/tools_code/RSA/";  
	  
			//RSAEncrypt.genKeyPair(filepath);
			  
			  
			System.out.println("--------------公钥加密私钥解密过程-------------------");  
			String plainText="ihep_公钥加密私钥解密";  
			//公钥加密过程  
			byte[] cipherData=RSAEncrypt.encrypt(RSAEncrypt.loadPublicKeyByStr(RSAEncrypt.loadPublicKeyByFile(filepath+"rsa_public_key.pem")),plainText.getBytes());  
			String cipher=Base64.encode(cipherData);  
			//私钥解密过程  
			byte[] res=RSAEncrypt.decrypt(RSAEncrypt.loadPrivateKeyByStr(RSAEncrypt.loadPrivateKeyByFile(filepath+"pkcs8_private_key.pem")), Base64.decode(cipher));  
			String restr=new String(res);  
			System.out.println("原文："+plainText);  
			System.out.println("加密："+cipher);  
			System.out.println("解密："+restr);  
			System.out.println();  
			  
			System.out.println("--------------私钥加密公钥解密过程-------------------");  
			plainText="ihep_私钥加密公钥解密";  
			//私钥加密过程  
			cipherData=RSAEncrypt.encrypt(RSAEncrypt.loadPrivateKeyByStr(RSAEncrypt.loadPrivateKeyByFile(filepath+"pkcs8_private_key.pem")),plainText.getBytes());  
			cipher=Base64.encode(cipherData);  
			//公钥解密过程  
			res=RSAEncrypt.decrypt(RSAEncrypt.loadPublicKeyByStr(RSAEncrypt.loadPublicKeyByFile(filepath+"rsa_public_key.pem")), Base64.decode(cipher));  
			restr=new String(res);  
			System.out.println("原文："+plainText);  
			System.out.println("加密："+cipher);  
			System.out.println("解密："+restr);  
			System.out.println();  
			  
			System.out.println("---------------私钥签名过程------------------");  
			String content="ihep_这是用于签名的原始数据";  
			String signstr=RSASignature.sign(content,RSAEncrypt.loadPrivateKeyByFile(filepath+"pkcs8_private_key.pem"));  
			System.out.println("签名原串："+content);  
			System.out.println("签名串："+signstr);  
			System.out.println();  
			  
			System.out.println("---------------公钥校验签名------------------");  
			System.out.println("签名原串："+content);  
			System.out.println("签名串："+signstr);  
			  
			System.out.println("验签结果："+RSASignature.doCheck(content, signstr, RSAEncrypt.loadPublicKeyByFile(filepath+"rsa_public_key.pem")));  
			System.out.println(); 
			  
		}  
	} 