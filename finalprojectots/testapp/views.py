from django.shortcuts import render
from django.http import HttpResponse
def menu():
    return"""
    <a href="http://localhost:8000/testapp/home/">Home</a>
    <a href="http://localhost:8000/testapp/about/">About</a>
    <a href="http://localhost:8000/testapp/contact/">Contacts</a>"""
def greeting(request):
    s= "<h1>hello shalini<h1>"
    s=menu()+s
    return HttpResponse(s)
def about(request):
    s= "<h1>hello about<h1>"
    s=menu()+s
    return HttpResponse(s)
def contact(request):
    s="<h1>hello contact<h1>"
    s=menu()+s
    return HttpResponse(s)

    #hamne yaha  greeting khudh banaya hai httprespone method use
    #liyahai ush ke liye HttpResponse ko import kiya hai
    # firstproject ke url.py me path set kiya hai or import kiya h greeting ko
