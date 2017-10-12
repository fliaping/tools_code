# 点我达开发平台开发手册

**以 [阿里巴巴Java开发手册](https://github.com/alibaba/p3c/blob/master/%E9%98%BF%E9%87%8C%E5%B7%B4%E5%B7%B4Java%E5%BC%80%E5%8F%91%E6%89%8B%E5%86%8C%EF%BC%88%E7%BB%88%E6%9E%81%E7%89%88%EF%BC%89.pdf) 为参考**

### 命名风格
1. 代码中的命名均不能以下划线或美元符号开始，也不能以下划线或美元符号结束。
2. 代码中的命名严禁使用拼音与英文混合的方式，特殊名词或标识可以使用拼音。
3. 类名使用`UpperCamelCase`风格，必须遵从驼峰形式，但以下情形例外：`DO/BO/DTO/VO/AO`
4. 方法名、参数名、成员变量、局部变量都统一使用`lowerCamelCase`风格，必须遵从驼峰形式。
5. 常量命名全部大写，单词间用下划线隔开，力求语义表达完整清楚，不要嫌名字长。
6. 抽象类命名使用`Abstract`或`Base`开头；异常类命名使用`Exception`结尾；测试类命名以它要测试的类的名称开始，以`Test`结尾。
7. 中括号是数组类型的一部分，数组定义如下：`String[] args`
8. `POJO`类中布尔类型的变量，都不要加is，否则部分框架解析会引起序列化错误。
9. 包名统一使用小写，点分隔符之间有且仅有一个自然语义的英语单词。包名统一使用单数形式，但是类名如果有复数含义，类名可以使用复数形式。
10. 如果使用到了设计模式，建议在类名中体现出具体模式，如`XxxxProxy`，`XxxxFactory`等。
11. 接口类中的方法和属性不要加任何修饰符号(public也不要加)，保持代码的简洁性，并加上有效的Javadoc注释。尽量不要在接口里定义变量，如果一定要定义变量，肯定是与接口方法相关，并且是整个应用的基础常量
12. 接口及实现规范
    1.  接口实现类用Impl的后缀，如果有多个实现类时，加上差异化前缀，例如：`RedisCacheServiceImpl`和`MemcacheCacheServiceImpl`
    2. 如果接口以I作为前缀命名，如`ICacheService`，则实现类用`RedisCacheService`和`MemcacheCacheService`  
    3. 如果是形容能力的接口名称，取对应的形容词做接口名(通常是`–able`的形式)。
13. 枚举类名建议带上`Enum`后缀，枚举成员名称需要全大写，单词间用下划线隔开。
14. 【参考】各层命名规约
    1. 获取单个对象的方法用`get`做前缀，如果有缓存用`load`(推荐)做前缀。
    2. 获取多个对象的方法用list或者`search`做前缀。
    3. 获取统计值的方法用`count`做前缀。
    4. 插入的方法用`save`(推荐)或`insert`做前缀。
    5. 删除的方法用`remove`(推荐)或`delete`做前缀。
    6. 修改的方法用`update`做前缀。
15. 领域模型命名规约
    1. 数据对象：`Xxxx`或`XxxxPO`者`XxxxDO`(推荐)，`xxx`即为数据表名。
    2. 数据传输对象：`XxxxDTO`，xxx为业务领域相关的名称。
    3. 展示对象：`XxxxVO`，xxx一般为网页名称。
    4. POJO是DO/DTO/BO/VO的统称，禁止命名成XxxPOJO。

### 常量定义
1. 不允许任何魔法值(即未经定义的常量)直接出现在代码中
2. long或者Long初始赋值时，必须使用大写的L，不能是小写的l，小写容易跟数字1混淆，造成误解。
3. 【推荐】不要使用一个常量类维护所有常量，应该按常量功能进行归类，分开维护。常量的复用层次有五层：跨应用共享常量、应用内共享常量、子工程内共享常量、包内共享常量、类内共享常量。
    1. 跨应用共享常量：放置在二方库中，通常是api.jar、common.jar或client.jar中的constant目录下。
    2. 应用内共享常量：放置在一方库的modules中的constant目录下。
    3. 子工程内部共享常量：即在当前子工程的constant目录下。
    4. 包内共享常量：即在当前包下单独的constant目录下。
    5. 类内共享常量：直接在类内部private static final定义。
4. 【推荐】如果变量值仅在一个范围内变化，且带有名称之外的延伸属性，定义为枚举类。

### 代码风格
1. 使用IDEA默认的代码风格
2. IDE的text file encoding设置为UTF-8； IDE中文件的换行符使用Unix格式，不要使用windows格式。
3. 【推荐】方法体内的执行语句组、变量的定义语句组、不同的业务逻辑之间或者不同的语义之间插入一个空行。相同业务逻辑和语义之间不需要插入空行。

### OOP规约
1. 避免通过一个类的对象引用访问此类的静态变量或静态方法，无谓增加编译器解析成本，直接用类名来访问即可。
2. 所有的覆写方法，必须加`@Override`注解。
3. 除非该方法只接受同一类型的一个或多个参数，否则不建议使用可变参数编程。
4. 外部正在调用或者二方库依赖的接口，不允许修改方法签名，避免对接口调用方产生影响。接口过时必须加`@Deprecated`注解，并清晰地说明采用的新接口或者新服务是什么。
5. 不能使用过时的类或方法，代码中发现过时方法，需尽快修改或替换。
6. 规避NPE(`NullPointerException`)
    1. 应使用常量或确定有值的对象来调用`equals`
    2. 所有的相同类型的包装类对象之间值的比较，全部使用`equals`方法比较
7. 关于基本数据类型与包装数据类型的使用标准如下
    1. 所有的POJO类属性必须使用包装数据类型
    2. RPC方法的返回值和参数必须使用包装数据类型
    3. 所有的局部变量使用基本数据类型
8. 定义DO/DTO/VO等POJO类时，不要设定任何属性默认值。
9. 构造方法里面禁止加入任何业务逻辑，如果有初始化逻辑，请放在init方法中，并再类描述中予以说明
10. 慎用`Object`的`clone`方法来拷贝对象，除非明确理解clone是浅拷贝。
11. 推荐使用成熟的工具类(如apache-commons，guava，lombok等)可以规避很多异常。


### 集合处理
1. 【强烈推荐】集合处理推荐使用成熟的工具类
2. 关于`hashCode`和`equals`的处理
    1. 只要重写equals，就必须重写`hashCode`。
    2. 因为Set存储的是不重复的对象，依据`hashCode`和`equals`进行判断，所以Set存储的对象必须重写这两个方法。
    3. 如果自定义对象做为Map的键，那么必须重写`hashCode`和`equals`。
3. `ArrayList`的`subList`结果不可强转成`ArrayList`，且`subList`不能进行对原集合元素个数的修改
4. 使用集合转数组的方法，必须使用集合的`toArray(T[] array)`，而不能用无参方法toArray()，传入的是类型完全一样的数组，大小就是list.size()
5. 使用工具类`Arrays.asList()`把数组转换成集合时，不能使用其修改集合相关的方法，它的add/remove/clear方法会抛出`UnsupportedOperationException`异常
6. 泛型通配符<? Extends T>来接收返回的数据，此写法的泛型集合不能使用add方法，而<? super T>不能使用get方法，做为接口调用赋值时易出错
7. 不要在foreach循环里进行元素的remove/add操作。remove元素请使用Iterator方式，如果并发操作，需要对Iterator对象加锁。

### 并发处理
1. 获取单例对象需要保证线程安全，其中的方法也要保证线程安全
2. 创建线程或线程池时请指定有意义的线程名称，方便出错时回溯
3. 线程资源必须通过线程池提供，不允许在应用中自行显式创建线程
4. 线程池不允许使用Executors去创建，而是通过`ThreadPoolExecutor`的方式
5. `SimpleDateFormat`是线程不安全的类，如果是JDK8的应用，可以使用`Instant`代替Date，`LocalDateTime`代替Calendar，`DateTimeFormatter`代替Simpledateformatter
6. 高并发时，同步调用应该去考量锁的性能损耗。尽量避免使用锁，或者减少锁的粒度，避免在锁代码块中调用RPC方法。
7. 并发修改同一记录时，避免更新丢失，需要加锁。要么在应用层加锁，要么在缓存加锁，要么在数据库层使用乐观锁，使用version作为更新依据。说明：如果每次访问冲突概率小于20%，推荐使用乐观锁，否则使用悲观锁。乐观锁的重试次数不得小于3次。
8. 多线程并行处理定时任务时，Timer运行多个TimeTask时，只要其中之一没有捕获抛出的异常，其它任务便会自动终止运行，使用`ScheduledExecutorService`则没有这个问题
9. 避免Random实例被多线程使用，虽然共享该实例是线程安全的，但会因竞争同一seed导致的性能下降。推荐使用JDK7之后的`ThreadLocalRandom`
10. volatile解决多线程内存不可见问题，适用于一写多读时解决变量同步问题，但是如果多写，同样无法解决线程安全问题。推荐使用JUC的原子操作
11. ThreadLocal无法解决共享对象的更新问题，ThreadLocal对象建议使用static修饰，且建议只存放独享数据。

### 控制语句
1. 在一个`switch`块内，每个case要么通过`break/return`等来终止，要么注释说明程序将继续执行到哪一个case为止，且必须包含default块。因为switch是匹配到case如果没有终止，则会执行之后的所有代码。
2. 在if/else/for/while/do语句中必须使用大括号。即使只有一行代码，避免使用单行的形式。
3. 尽量使用卫语句代替if-else；如果if-else超过3层以上则使用“状态模式”代替
4. 不要在条件判断中执行复杂判断语句，将复杂逻辑判断的结果赋值给一个有意义的布尔变量名，以提高可读性，推荐将特别复杂的逻辑判断封装成方法。
5. 【推荐】循环体中的语句要考量性能，以下操作尽量移至循环体外处理，如定义对象、变量、获取数据库连接，进行不必要的try-catch操作。
6. 下列情形，需要进行参数校验
    1. 调用频次低的方法
    2. 执行时间开销很大的方法
    3. 需要极高稳定性和可用性的方法
    4. 对外提供的开放接口，不管是RPC/API/HTTP接口
    5. 敏感权限入口

### 注释
1. 类、类属性、类方法的注释必须使用Javadoc规范。
2. 所有的抽象方法(包括接口中的方法)必须要用Javadoc注释、除了返回值、参数、异常说明外，还必须指出该方法做什么事情，实现什么功能。
3. 所有的类都必须添加创建者和创建日期。
4. 方法内部单行注释，在被注释语句上方另起一行，使用//注释。方法内部多行注释使用/**/注释，注意与代码对齐。
5. 好的命名、代码结构是自解释的，注释力求精简准确、表达到位。
6. 【建议】需求相关的小改动，把需求相关链接放到注释中
7. 特殊注释标记，请注明标记人与标记时间
    1. 待办事宜(TODO)：(标记人，标记时间，[预计处理时间])
    2. 不能工作(FIXME)：(标记人，标记时间，[预计处理时间])

### 异常处理
1. Java类库中定义的`RuntimeException`可以通过预先检查进行规避，而不应该通过catch来处理
2. 如果使用`RuntimeException`作为业务异常，则要么在方法定义时`throws`或者在Javadoc中显示声明
3. 异常不要用来做流程控制，条件控制，因为异常的处理效率比条件分支低
4. 捕获异常又不处理，那么请重新抛出。最外层的业务使用者，必须处理异常，将其转化为用户可以理解的内容
5. 方法的返回值可以为null，不强制返回空集合（但是建议返回空集合），或者空对象等，但必须注释充分说明什么情况下会返回null值
6. 在代码中使用“抛异常”还是“返回错误码”，
    1. 对于公司外的http/api开放接口必须使用“错误码；
    2. 而应用内部推荐异常抛出；
    3. 跨应用间RPC调用优先考虑使用Result方式，封装isSuccess()方法、“错误码”、“错误简短信息”。

### 日志规约
1. 统一使用日志Facade框架如SLF4J中的API
2. 日志的输出必须使用占位符的方式，如：`logger.debug("id is {}"，id)`。
3. 避免重复打印日志，浪费磁盘空间，务必在log4j.xml中设置`additivity=false`。
4. 异常信息应该包括两类信息：案发现场信息和异常堆栈信息，如：`logger.error("somethingerror"，e)`。
5. 谨慎地记录日志！项目稳定后，生产环境禁止输出debug日志；有选择地输出info日志
6. 业务日志最大以小时为单位进行分割，以方便问题时处理，尽量使用异步日志
7. 注意日志输出的级别，error级别只记录系统逻辑出错、异常等重要的错误信息。如非必要，请不要在此场景打出error级别。

### 数据相关操作
1. 数据库表应该包含ins_tm DEFAULT CURRENT_TIMESTAMP和upd_tm ON UPDATE CURRENT_TIMESTAMP
2. 使用MybatisGenerator的插入和更新应尽量使用insertSelective和updateSelective
3. 小数类型为decimal，禁止使用float和double
4. 字符串的类型统一使用utf8bm4以防止特殊字符写入失败
5. 其他参考DBA制定规范

### 其他
1. 在使用正则表达式时，利用好其预编译功能，可以有效加快正则匹配速度
2. 使用`System.currentTimeMillis()`或`System.nanoTime()`获取时间戳，在JDK8中，针对统计时间等场景，推荐使用Instant类。
3. 防止NPE，是程序员的基本修养，注意NPE产生的场景：
    1. 返回类型为基本数据类型，return包装数据类型的对象时，自动拆箱有可能产生NPE。
    2. 数据库的查询结果可能为null。
    3. 集合里的元素即使isNotEmpty，取出的数据元素也可能为null。
    4. 远程调用返回对象时，一律要求进行空指针判断，防止NPE。
    5. 对于Session中获取的数据，建议NPE检查，避免空指针。
    6. 级联调用obj.getA().getB().getC()类似的一连串调用，易产生NPE。
4. 给JVM设置-XX:+HeapDumpOnOutOfMemoryError参数，让JVM碰到OOM场景时输出dump信息。
5. 二方库依赖规范
    1. 二方库可以定义枚举类型，参数可以使用枚举类型，但是接口返回值不允许使用枚举类型或者包含枚举类型的POJO对象
    2. 发布二方库者应当移除一切不必要的API和依赖，只包含Service API、必要的领域模型对象、Utils 类、常量、枚举等。
    3. 如果依赖其它常用二方库时，尽量是provided引入，让二方库使用者去依赖具体版本号; 
    4. 无log具体实现，只依赖日志框架。

### 应用分层
##### 1. 接口定义包
┣ `provider` （Dubbo接口定义）
┣ `constant`（常量）
┣ `enums` （枚举）
┣ `util` （工具）
┣ `exception` （异常定义）
┗ `dto` （业务对象定义） 

##### 2. Client包（*可选*）
┣ `provider`（存放Dubbo接口的Client）
┣ `${custom}`（自定义，根据功能模块划分）
┗ `dto`（*可选*，内部通用工具）

##### 3. 业务服务工程
┣ `config`（应用配置信息）
┣ `provider`（Dubbo接口具体实现）
┣ `web`（Web服务接口，可以直接再下面放各种controller）
┃   ┣ `${filter}` （*可选*，各种拦截器）
┃   ┣ `dto` （放置各种请求和响应的封装）
┃   ┗ `controller`（*可选*）
┣ `schedule` （基于spring的自调度的定时任务）
┣ `job`（基于外部调度系统的定时任务）
┣ `mq`（消息相关，各种Consumer、Producer及MessageListener等）
┣ `service`（业务处理层）
┃   ┣ `aspect` （*可选*）
┃   ┣ `util` （*可选*）
┃   ┣ `constants`（*可选*，）
┃   ┗ `${package}`（*可选*，如果业务比较复杂，则可以建子包）
┣ `manager`（对第三方调用的封装、Service通用服务的下层：如缓存/中间件）
┃   ┗ `${同上}`（*可选*）
┣ `dto/bo`（应用内通用的业务对象） 
┣ `constant`（内部常量）
┣ `enums`（内部通用枚举）
┗ `util`（内部通用工具）

##### 4. 数据访问工程（*可选*，可以直接放业务服务工程中）
┣ `mapper`（Mybatis Generator自动生成）
┃   ┣  `ext`（mapper的extends）
┣ `po`（Mybatis Generator自动生成）
┗ `dto`（内部通用工具）

#### 命名指南
- 启动类：`ServiceRunner`
- 配置类：
    - 配置类：`XxxConfiguration`
    - 配置属性：`XxxProperties`
- Dubbo服务
    - 接口定义：`XxxProvider`
    - 接口实现：`XxxProviderImpl`
    - 接口客户端：`XxxProviderClient`
- Web相关
    - 类：`XxxController`
    - 请求响应：`XxxReq`和`XxxResp`
- 业务层：`XxxService`
- 服务沉降层：`XxxManager`
- 工具类：`XxxUtils`
- 常量类：`XxxConsts`
- 枚举类：`XxxEnum`
- 消息类：
    - 消费者：`XxxConsumer`
    - 消息监听器（建议作为Consumer内部类）：`XxxMessageListener`
    - 消息生产者：`XxxProducer`
- 自调度定时任务：`XxxSchedule`
- Dubbo调度定时任务：`XxxJob`
- POJO定义
    - 数据映射对象：`XxxPO`或`XxxDO`
    - 数据传输对象：`XxxDTO`
    - 业务领域对象：`XxxBO`
    - 对外请求对象：`XxxRequest`和`XxxResponse`
- 其他
    - 工厂：`XxxFactory`
    - 代理：`XxxProxy`
    - 上下文变量持有：`XxxHolder`
    - 帮助类：`XxxHelper`