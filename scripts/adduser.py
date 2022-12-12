import requests
import os
import csv

cur_dir = os.path.realpath(__file__)
cur_dir = os.path.split(cur_dir)[0].replace('\\', '/')

def add_users_from_csv(csv_path):
    with open(csv_path, encoding='utf-8') as f:
        f_csv = csv.reader(f)
        for id, name in f_csv:
            response = requests.post(f"http://{ip}/add-users",
                                     data={
                                         'username': id,
                                         'password': '000000',
                                         'real_name': name
                                     }
                                     )
            print(response.text)


def add_user(usergroup, username, password, real_name):
    response = requests.post(f"http://{ip}/add-users",
                             data={
                                 'usergroup': usergroup,
                                 'username': username,
                                 'password': password,
                                 'real_name': real_name
                             }
                             )
    print(response.text)


if __name__ == "__main__":
    ip = 'localhost'
    add_user('S', '22121214', '000000', '唐仲思')
    add_user('S', '22221310', '000000', '陆飞洋')
    add_users_from_csv(os.path.join(cur_dir, '2022.csv'))
