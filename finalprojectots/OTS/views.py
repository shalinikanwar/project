from django.shortcuts import render

from OTS.models import Question,User

from django.http import HttpResponse,HttpResponseRedirect
import random

def newQuestion(request):
   try:
    realname=request.session['realname']   
    res=render(request,'OTS/new_question.html')
    return res
   except KeyError:
     return HttpResponseRedirect("http://localhost:8000/OTS/login/")  


def saveQuestion(request):

    question=Question()

    question.que=request.POST['question']

    question.optiona=request.POST['optiona']

    question.optionb=request.POST['optionb']

    question.optionc=request.POST['optionc']

    question.optiond=request.POST['optiond']

    question.answer=request.POST['answer']

    question.save()

    return HttpResponseRedirect('http://localhost:8000/OTS/view-question/')#predefine function save in model class

    #question is name="question" in html file

def viewQuestion(request):
  try:
    realname=request.session['realname']

    questions=Question.objects.all()

    #table ke record yaha aa jayege all()se

    res=render(request,'OTS/view_question.html',{'questions':questions})
    return res
  except KeyError:
      return HttpResponseRedirect("http://localhost:8000/OTS/login/")

def editQuestion(request):
 
    q=request.GET['qno']
    question=Question.objects.get(qno=int(q))#qno is primary key table q is variable name

    res=render(request,'OTS/edit_question.html',{'question':question})
    return res
  
  

def editsavequestion(request):
 
    question=Question()

    question.qno=request.POST['qno']

    question.que=request.POST['question']

    question.optiona=request.POST['optiona']

    question.optionb=request.POST['optionb']

    question.optionc=request.POST['optionc']

    question.optiond=request.POST['optiond']

    question.answer=request.POST['answer']

    question.save()

    return HttpResponseRedirect('http://localhost:8000/OTS/view-question/')
 

def deletequestion(request):
    try:
       realname=request.session['realname']
       q=request.GET['qno']
       question=Question.objects.filter(qno=int(q))
       question.delete()

       return HttpResponseRedirect('http://localhost:8000/OTS/view-question/')

    except KeyError:

        return HttpResponseRedirect("http://localhost:8000/OTS/login/")


     

def signup(request):

    d1={}

    try:
    

      if request.GET['error']==str(1):

        d1['errmsg']='Username already taken'

    except:

        d1['errmsg']=''


    res=render(request,'OTS/signup.html',d1)
    return res

def saveUser(request):

    user=User()

    u=User.objects.filter(username=request.POST['username'])

    if not u:

        user.username=request.POST['username']

        user.password=request.POST['password']

        user.realname=request.POST['realname']

        user.role="LEARNER"

        user.save()

        url="http://localhost:8000/OTS/login/"
    else:

        url="http://localhost:8000/OTS/signup?error=1/"
        
        

    return HttpResponseRedirect(url)


def login(request):
  user=User.objects.filter(username="admin")
  if not user:
      createAdmin()
  res=render(request,'OTS/login.html')
  return res

  

def logout(request) :

        request.session.clear()#sabhi session clear#ek session clear ke liye del.request.session['realname']

        url="http://localhost:8000/OTS/login/"

        return HttpResponseRedirect(url)

def loginValidation(request):
    #u=User.objects.filter(username=request.POST['username'],password=request.POST['password'])
    try: #login successful
        u=User.objects.get(username=request.POST['username'],password=request.POST['password'])
        request.session['username']=u.username
        request.session['realname']=u.realname
        request.session['role']=u.role
        url="http://localhost:8000/OTS/home/"
    except:
        url="http://localhost:8000/OTS/login/"
    return HttpResponseRedirect(url)

def home(request):

    try:
       
       realname=request.session['realname']

    except KeyError:

        return HttpResponseRedirect("http://localhost:8000/OTS/login/")



    #agar ye argument me render me nhi dena chau or html me access bhi karana session variable ko ham jb tk session chalu h use 

    #le sakte hai then home.html me likhna hoga request.session.realname

    #real ye jinja ka nam hai jo html file me kam melege

    #realname jo hamane session start kiya hai vo

    res=render(request,'OTS/home.html',{'realname':realname})
    return res

def starttest(request):
  try:
    realname=request.session['realname']
    no_of_que=6
    questions_pool=list(Question.objects.all())
    random.shuffle(questions_pool)
    questions_list=questions_pool[:no_of_que]
    res=render(request,'OTS/start_test.html',{'questions':questions_list})
    return res
  except KeyError:
      return HttpResponseRedirect("http://localhost:8000/OTS/login/")
 
  
def createAdmin():
    user=User()
    user.username="admin"
    user.password="password"
    user.role="ADMIN"
    user.realname="Super User"
    user.save()
def testResult(request):
  try:
    realname=request.session['realname']
    total_attempt=0
    total_right=0
    total_wrong=0
    qno_list=[]
    for k in request.POST:#request .post dict hai to ye key ke liye chlata hai
        #hame nhi pta ki name kya hoga kyu ki hamne to qno{{question.qno}} di hi start_test me 
        #jb ham request.POST use lege jish me shara data rahega

        if k.startswith("qno"):
            #str me startswith method hai name="qno1",name="qno2" qno se start
            #huaa jb hi ye chlega
            qno_list.append(int(request.POST[k]))
    for n in qno_list:
        question=Question.objects.get(qno=n)
        try:
            if question.answer==request.POST['q'+str(n)]:
                total_right+=1
            else:
                total_wrong+=1
            total_attempt+=1
        except:
            pass
  
    d={'total_attempt':total_attempt,'total_right':total_right,'total_wrong':total_wrong}
    res=render(request,'OTS/test_result.html',d)
    return res
  except KeyError:
         return HttpResponseRedirect("http://localhost:8000/OTS/login/")

