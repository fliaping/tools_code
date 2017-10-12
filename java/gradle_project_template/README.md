# Gradle plugin

|入参|描述|是否可为空|默认值|示例|
|---|---|---|---|---|
|group| |否|无|com.dianwoda|
|name| |否|无|test|
|version|是|1.0-SNAPSHOT|2.0-SNAPSHOT|
|templatePath|zip模板文件位置|否|无|F:/github/study/gradle-archetype-templates-1/templates/dubbo.zip|
|tempTemplateDir|zip模板文件临时解压目录|是|/tmp/template|E: /tmp/template|
|targetDir|文件生成目标目录|是|当前目录|test|

```groovy
buildscript {
 
    repositories {
 
        mavenLocal()
 
        maven {
 
            url "http://192.168.1.177:8081/nexus/content/repositories/snapshots"
 
        }
 
    }
 
    dependencies {
 
        classpath "com.dianwoda:gradle-archetype-starter-plugin:1.0-SNAPSHOT"
 
    }
 
}

apply plugin: "gradle-archetype-plugin"
```
示例命令：

`gradle initProject -Dgroup=com.dianwoda -Dname=test -DtemplatePath=F:/github/study/gradle-archetype-templates-1/templates/dubbo.zip`

# Init gradle

|入参|描述|是否可为空|默认值|示例|
|---|---|---|---|---|
|group| |否|无|com.dianwoda|
|name| |否|无|test|
|version|是|1.0-SNAPSHOT|2.0-SNAPSHOT|
|templatePath|zip模板文件位置|否|无|F:/github/study/gradle-archetype-templates-1/templates/dubbo.zip|
|tempTemplateDir|zip模板文件临时解压目录|是|/tmp/template|E: /tmp/template|
|targetDir|文件生成目标目录|是|当前目录|test|
|initProject|是否初始化项目|是|false|-DinitProject=true|

```groovy
initscript {
 
    repositories {
 
        mavenLocal()
 
        maven { url "http://192.168.1.177:8081/nexus/content/repositories/snapshots" }
 
    }
 
 
 
    dependencies {
 
        classpath "com.dianwoda:gradle-archetype-starter-init-gradle:1.0-SNAPSHOT"
 
    }
 
}
 
String initProject = System.getProperty("initProject")
 
if (initProject == "true") {
 
    println "init project..."
 
    com.dianwoda.init.gradle.InitProcess.process()
 
}
```

新建init.gradle 文件，内容如上。
复制至GRADLE_HOME/init.d目录下。
新建文件夹，在该文件夹内执行命令：

`gradle init -DinitProject=true -Dgroup=com.dianwoda -Dname=test -DtemplatePath=F:/github/study/gradle-archetype-templates-1/templates/dubbo.zip`