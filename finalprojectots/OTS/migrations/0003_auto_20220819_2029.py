# Generated by Django 3.2.15 on 2022-08-19 14:59

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('OTS', '0002_user'),
    ]

    operations = [
        migrations.AlterField(
            model_name='user',
            name='realname',
            field=models.CharField(max_length=20),
        ),
        migrations.AlterField(
            model_name='user',
            name='username',
            field=models.CharField(max_length=20, primary_key=True, serialize=False),
        ),
    ]
