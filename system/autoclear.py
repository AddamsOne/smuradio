#!/usr/bin/python
#coding=utf-8
import MySQLdb
import time
import sys
import json
#导入config/setting.json
f = open("../config/setting.json","r")
content = f.readline() 
jsonVal = json.loads(content)
conn = MySQLdb.connect(
        host = jsonVal['DB_Host'],
        port = 3306,
        user = jsonVal['DB_User'],
        passwd = jsonVal['DB_Password'],
        db = jsonVal['DB_Name'],
        )
cur = conn.cursor()
#只删除显示表信息，保留日志表信息(减少读取时间)
cur.execute("DELETE FROM ticket_view WHERE info <> 0;")
var=[time.strftime('%Y-%m-%d %X')]
cur.execute("UPDATE setting SET cleantime = %s;",var)
cur.close()
conn.commit()
conn.close()