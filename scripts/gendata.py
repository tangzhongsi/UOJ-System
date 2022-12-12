import math
import os

cur_dir = os.path.realpath(__file__)
cur_dir = os.path.split(cur_dir)[0].replace('\\','/')
data_path = os.path.join(cur_dir, "../testdata")

for i in range(1, 11):
    input_path = os.path.join(data_path, f'input{i}.txt')
    output_path = os.path.join(data_path, f'output{i}.txt')
    with open(input_path, 'r') as fin:
        with open(output_path, 'w') as fout:
            a, b = fin.read().split(' ')
            fout.write(str(math.comb(int(a), int(b))))

