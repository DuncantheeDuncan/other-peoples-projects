 
# days of the week represented in numbers
#  this program takes an inputs from the user 
# and a number is assagned with a day in the week
daysOfTheWeek = input("enter a number between a 1 and 7: ")



if (daysOfTheWeek == 1):
	print "Monday"

elif(daysOfTheWeek == 2):
	print "Tuesday"
elif(daysOfTheWeek == 3):
	print "Wednesday"
elif(daysOfTheWeek == 4):
	print "Thursday"
elif(daysOfTheWeek == 5):
	print "Friday"
elif(daysOfTheWeek == 6):
	print "Saturday"
elif(daysOfTheWeek == 7):
	print "Sunday"

else:
	(daysOfTheWeek >7 | daysOfTheWeek <1)
	print "error ",daysOfTheWeek," is not within the range of 1 and 7\n",
	"Please enter a number between 1 and 7"