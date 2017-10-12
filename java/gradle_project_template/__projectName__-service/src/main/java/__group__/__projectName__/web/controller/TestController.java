package @group@.@projectName@.web.controller;

import @group@.@projectName@.web.dto.req.TestReq;
import @group@.@projectName@.web.dto.resp.TestResp;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

/**
 * Created by Administrator on 2017/9/29.
 */
@RestController
public class TestController {
    private Logger logger = LoggerFactory.getLogger(getClass());

    @RequestMapping("/test")
    public TestResp test(TestReq req) {
        TestResp resp = new TestResp();
        resp.setRet(req.getTest());
        return resp;
    }
}
