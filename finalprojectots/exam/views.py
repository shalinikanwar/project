from django.shortcuts import render
from django.http import HttpResponse
def testpaper(request):
    q="developer of c"
    a="denni reatic"
    b="shalu"
    c="shalini"
    d="none"
    d1={'que':q,'a':a,'b':b,'c':c,'d':d}
    res=render(request,'exam/show_test.html',d1)
    return res
def testresult(request):
    s="<h1>test result</h1>"
    return HttpResponse(s)
