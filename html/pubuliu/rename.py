import os
import os.path
def printDir(path):
	fileList=[]
        files=os.listdir(path)
        i=0
        for fl in files:
		if os.path.isdir(path+'/'+fl):
			pass
                elif os.path.isfile(path+'/'+fl):
                        fileList.append(fl)
                        os.rename(os.path.join(path,fl),os.path.join(path,str(i)+'.jpg'))
			i+=1
                else:
                        pass
         
if __name__=='__main__':
	printDir('/var/www/html/pubuliu/images/')

