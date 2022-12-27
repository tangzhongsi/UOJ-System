import os
import shutil
from datetime import datetime

date = datetime.today().strftime('%Y-%m-%d')
cur_dir = os.path.realpath(__file__)
cur_dir = os.path.split(cur_dir)[0]


def dump_database(container_name="uoj", db_passwd="root"):
    dump_cmd = f"mysqldump --password={db_passwd} --databases app_uoj233 > /opt/uoj/web/app/storage/app_uoj233_{date}.sql"
    os.popen(f'docker exec {container_name} /bin/bash -c "{dump_cmd}"')


if __name__ == "__main__":
    dump_database()

    root_dir = os.path.abspath(os.path.join(cur_dir, ".."))
    storage_dir = os.path.join(root_dir, "web/app/storage")
    archive_dir = os.path.join(root_dir, "archive")
    zip_path = os.path.join(archive_dir, date)
    shutil.make_archive(base_name=zip_path,
                        format='zip',
                        root_dir=storage_dir,
    )
