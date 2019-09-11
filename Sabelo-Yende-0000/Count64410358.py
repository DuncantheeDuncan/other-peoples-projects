

space = "\n"
# this program counts the number of floats numbers that are greater than 25.0
#  and returns a string.

floatone =float(input("Enter the First float number: "))
floattwo =float(input("Enter the Second float number: "))
floatthree =float(input("Enter the Third float number: "))
floatfour =float(input("Enter the Fourth float number: "))
floatfive =float(input("Enter the Fifth float number: "))
print space



lists = [floatone,floattwo,floatthree,floatfour,floatfive]

for display in lists:
	print "this is the enterd number %.3f " %display
	print space


for x in lists: 

	if(x > 25.5):

		nuw = [x]
		
		nuw.append(x)

		print "Found ",len(nuw),"numbers that are greater than 25.5 "
		break
	else:
		print "No number that is grater than 25.5 was enterd"
		break
	
