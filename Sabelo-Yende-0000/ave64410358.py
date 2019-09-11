

# taking user input from the user
space ="\n"
print space

one = input("enter the first number ")
two = input("enter the second number ")
three = input("enter the third number ")
four = input("enter the fourth number ")
five = input("enter the fifth number ")

print space
print space

# Displaying the output from the user.
print "you entered ", one ," as your first number"
print "you entered ", two ," as your second number"
print "you entered ", three ," as your third number"
print "you entered ", four ," as your fourth number"
print "you entered ", five ," as your fifth number"


length = [one,two,three,four,five]
answer = one+two+three+four+five


print space
# print len(length)
le = len(length)
total = answer / le

print "The avarage value is :%.2f" %total