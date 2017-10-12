package @group@.@projectName@.provider;

import @group@.@projectName@.dto.req.TestReq;
import @group@.@projectName@.dto.resp.TestResp;
import org.springframework.stereotype.Component;

/**
 * Created by Administrator on 2017/9/29.
 */
@Component
public class TestProviderImpl implements TestProvider {
    @Override
    public TestResp test(TestReq req) {
        TestResp resp = new TestResp();
        resp.setRet(req.getTest());
        return resp;
    }
}
