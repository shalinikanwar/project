from django.urls import path
from .views import *
urlpatterns = [
    path('test-paper/',testpaper),
    path('test-result/',testresult),]
