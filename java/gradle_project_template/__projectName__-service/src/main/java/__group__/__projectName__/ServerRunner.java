package @group@.@projectName@;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.jdbc.DataSourceAutoConfiguration;
import org.springframework.cloud.client.discovery.EnableDiscoveryClient;
import org.springframework.context.annotation.ImportResource;

/**
 * Created by Administrator on 2017/9/29.
 */
@EnableDiscoveryClient
@ImportResource(locations = "classpath:/spring/app-context-*.xml")
@SpringBootApplication(exclude = DataSourceAutoConfiguration.class)
public class ServerRunner {
    public static void main(String[] args) {
        SpringApplication.run(ServerRunner.class);
    }
}
