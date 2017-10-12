package @group@.@projectName@.provider;

import @group@.@projectName@.dto.req.TestReq;
import @group@.@projectName@.dto.resp.TestResp;

/**
 * Created by Administrator on 2017/9/29.
 */
public interface TestProvider {
    TestResp test(TestReq req);
}
