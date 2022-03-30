import os

# 把程序所在文件夹下中所有文件的文件名中的英文重命名成大写。
# 不处理文件后缀名,不处理子文件夹中的文件,不处理文件夹名称。

rootdir = os.path.dirname(os.path.realpath(__file__))  # 获取本体程序所在目录
v = 0  # 计数
for i in os.scandir(path=rootdir):  # 遍历程序所在目录下所有对象
    if i.is_file():  # 仅处理文件
        base, ext = os.path.splitext(i.name)  # 返回文件名和拓展名
        filerename = os.path.join(rootdir, base[0].upper() + base[1:] + ".go")  # 合并大写处理后的文件名与路径
        os.rename(i.path, filerename)  # 重命名
        print(filerename)  # 打印
        v += 1  # 计数+1
input(f"执行完毕...共重命名{v}个文件！")