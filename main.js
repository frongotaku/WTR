var request = require('request');
var options = {
  'method': 'POST',
  'url': 'https://api.line.me/v2/bot/user/Uc7026ba61505c5e3ae2877cbda30e3a0/richmenu/richmenu-f4565360bc2e4439f1a2b6bee10d5e04',
  'headers': {
    'Authorization': 'Bearer Ybt8pl9LynUdSvMIcSlQiEvG+ZcXCHL2PEkhhgQ7HUm0JlSdS0t6N+3X5IxG4l21xjMqgpZlXGcv+yV6PathA4ppGc7RQdrjX/vvQZ7E6aURroy04yeUM4zbmJ2h+PdCByvFcAsEhDSf85m9YdsLMwdB04t89/1O/w1cDnyilFU='
  }
};
request(options, function (error, response) {
  if (error) throw new Error(error);
  console.log(response.body);
});
