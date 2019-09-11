


# this program takes a string to be replaced
# by another string in ceratina char(index)
# and return the new string/ word.

words = raw_input("enter a name:")

print words

replace = raw_input("Enter word to replace:")

if replace in words:
 i = words.replace(replace,"&&&&");
 print i

else:
  print 'Hint: - refer to built-in functions for strings.'

