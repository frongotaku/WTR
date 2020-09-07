var ss = SpreadsheetApp.openByUrl("https://docs.google.com/spreadsheets/d/1Ap77eL4IcZ5cGRrTdC3WeHahynW4Dyi3xPxxHkDOkgc/edit");
var sheet = ss.getSheetByName("สรุปSTOCK");
function doPost(e) {
   
  var data = JSON.parse(e.postData.contents)
  var userMsg = data.originalDetectIntentRequest.payload.data.message.text;
  var values = sheet.getRange(2, 3, sheet.getLastRow(),sheet.getLastColumn()).getValues();
for(var i = 0;i<values.length; i++){
    
    if(values[i][0] == userMsg ){
      i=i+2;
var Code = sheet.getRange(i,6).getValue(); //สินค้า
var Data1 = sheet.getRange(i,8).getValue(); //ราคาขาย-ปลีก
//var Data2 = sheet.getRange(i,5).getValue(); //ราคาขาย-ส่ง
//var Data3 = sheet.getRange(i,6).getValue(); //คงเหลือ

      var result = {
    "fulfillmentMessages": [
  {
    "platform": "line",
    "type": 4,
    "payload" : {
    "line":  {  
  "type": "flex",
  "altText": "this is a flex message",
  "contents": 
{
  "type": "bubble",
  "styles": {
    "footer": {
      "separator": true
    }
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "คลังสินค้า",
        "weight": "bold",
        "color": "#1DB446",
        "size": "sm"
      },
      {
        "type": "text",
        "text": Code,
        "weight": "bold",
        "size": "xxl",
        "margin": "md"
      },
      {
        "type": "text",
        "text": "บริษัท Bangkok Unitrade จำกัด",
        "size": "xs",
        "color": "#aaaaaa",
        "wrap": true
      },
      {
        "type": "separator",
        "margin": "xxl"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "xxl",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "คงเหลือ",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": ""+Data1,
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "ราคาขาย-ส่ง",
                "size": "sm",
                "color": "#555555",
                
              },
              {
                "type": "text",
                "text": ""+Data2,
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "สินค้าคงเหลือ",
                "size": "sm",
                "color": "#555555",
                
              },
              {
                "type": "text",
                "text": ""+Data3,
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "separator",
            "margin": "xxl"
          },

        ]
      },
 
      {
        "type": "box",
        "layout": "horizontal",
        "margin": "md",
        "contents": [
          {
            "type": "text",
            "text": "ผู้ดูแลสินค้าคงคลัง",
            "size": "xs",
            "color": "#aaaaaa",
            
          },
          {
            "type": "text",
            "text": "ประหยัด จันทร์อังคาร",
            "color": "#aaaaaa",
            "size": "xs",
            "align": "end"
          }
        ]
      }
    ]
  }
}
  
}

        
   }
  }
 ]
}
      
    var replyJSON = ContentService.createTextOutput(JSON.stringify(result)).setMimeType(ContentService.MimeType.JSON);
    return replyJSON;
}
  }
}
//หากต้องการเปิดการสนับสนุนโปรแกรมอ่านหน้าจอ ให้กด Ctrl+Alt+Z หากต้องการเรียนรู้เกี่ยวกับแป้นพิมพ์ลัด ให้กด Ctrl+เครื่องหมายทับ (/)
