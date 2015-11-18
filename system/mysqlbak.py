#!/usr/bin/python
#coding=utf-8
import time
f = open("../config/setting.json","r")
content = f.readline() 
jsonVal = json.loads(content)
mysql_comm = 'mysqldump'
mysql_user = jsonVal['DB_User']
mysql_passwd = jsonVal['DB_Password']
mysql_bak_database = jsonVal['DB_Name']
bak_dir = '~/bak'
today = time.strftime('%Y-%m-%d')
while True:
    if os.path.exists(bak_dir):
        bak_shell = '{0} -u{1} -p{2} {3} >{4}{5}.sql'.format(mysql_comm,mysql_user,mysql_passwd,mysql_bak_database,bak_dir,mysql_bak_database)
        tgzfile = 'tar -zcvf {0}{1}.{2}.tar.gz  {3}{4}.sql 1>/dev/null 2>/dev/null'.format(bak_dir,mysql_bak_database,today,bak_dir,mysql_bak_database)
        rm_file = 'rm -rf {0}{1}.sql'.format(bak_dir,mysql_bak_database)
        os.system(bak_shell)
        os.system(tgzfile)
        os.system(rm_file)
        break
    elif not os.path.exists(bak_dir):
        os.mkdir(bak_dir)