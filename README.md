# [微信域名检测系统](https://wx.horocn.com/product-domain-check.html)

## 项目介绍
![微信域名检测-已停止访问该网页.png](https://i.loli.net/2018/12/21/5c1cdf42aa290.png)

微信域名检测系统可以实时检测被微信拦截的域名，其中包括：
* 已停止访问该网页
* 网页包含诱导分享
* 诱导关注内容，被多人投诉，为维护绿色上网环境，已停止访问

---

## 使用说明
[微信域名检测接口](https://wx.horocn.com/product-domain-check.html)：[https://wx.horocn.com/api/v1/wxUrlCheck?api_token=your_api_token&req_url=www.qq.com
](https://wx.horocn.com/api/v1/wxUrlCheck?api_token=your_api_token&req_url=www.qq.com)


### 微信域名检测接口请求参数说明
| 名称  | 必填 | 类型 | 说明 |
| ------------- | ------------- | ------------- | ------------- |
| api_token  | 是  | string  | 用户的API Token，在[用户中心](https://wx.horocn.com/user/center.html)可以查询到，用于API调用  |
| req_url  | 是  | string  | 需要检测的url或域名，例：https://www.qq.com/ 或 www.qq.com  |


### 微信域名检测接口返回结果
```json
// 服务端正常处理请求，且域名正常
{
    "code": 0,
    "msg": "OK",
    "data": {
        "status": "ok"
    }
}

// 服务端正常处理请求，但域名被封
{
    "code": 0,
    "msg": "OK",
    "data": {
        "status": "blocked"
    }
}

// 请求频率过快
{
    "code": 10001,
    "msg": "接口调用频率过快",
    "data": []
}

// 服务端处理请求出现异常
{
    "code": 10004,
    "msg": "系统内部错误，请重试",
    "data": []
}
```

> 请替换上面的 API Token，该值在用户中心可以查询到

---

## 更新日志（CHANGELOG）
### 2018-12-08 微信域名检测系统更新说明
* cookie 采集服务与微信域名检测服务分离
* 微信域名检测服务与微信域名检测key授权分离，方便以后的部署

### 2018-12-05 微信域名检测系统更新说明
* 统一使用 Redis 作为缓存
* 微信域名检测底层服务更新改造

### 2018-12-02 微信域名检测系统更新说明
* 优化微信域名检测服务API，降低接口的响应时间
* 分布式部署以及负载均衡

---

## 功能介绍
### 承载海量并发
微信域名检测系统使用可扩张的分布式调度集群，能承载海量并发请求

### 检测实时响应
微信域名检测接口可随时检测域名当前状态，毫秒级别响应

### 提升服务质量
微信域名检测系统可将您的产品服务中断时间由几十分钟降低到几秒

### API查询
微信域名检测系统提供API，可以很方便的接入您的系统
