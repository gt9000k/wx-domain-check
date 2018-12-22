# -*- coding: utf-8 -*-

import json, urllib
from urllib import urlencode

def main():
    # 您的 API Token，在用户中心可查询到
    apiToken = "*********************"

    url = "https://wx.horocn.com/api/v1/wxUrlCheck"
    params = {
        "req_url" : "www.qq.com", #需要检测的地址或域名
        "api_token" : apiToken,

    }
    params = urlencode(params)
    f = urllib.urlopen("%s?%s" % (url, params))

    content = f.read()
    res = json.loads(content)
    if res:
        code = res["code"]
        if code == 0:
            #成功请求
            print res["result"]
        else:
            print "%s: %s" % (res["code"],res["msg"])
    else:
        print "request api error"

if __name__ == '__main__':
    main()
