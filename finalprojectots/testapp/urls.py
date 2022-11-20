from django.urls import path
from .views import *
urlpatterns = [
path('home/',greeting),#jb hame localhost:8000 se hi run karana ho '' khali chodh dege
    path('about/',about),#about/ ki jagah or kuch bhi de sakte hai hamari maraji hai ham koi bhi url set kr sakte hai
    #but function ka nam same hona chaiye
    path('contact/',contact),
]