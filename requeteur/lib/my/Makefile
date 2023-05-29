SRC	=	*.c

OBJ	=	$(SRC:.c=.o)

NAME	=	libmy.a

all:	create clean copy

create:
	gcc -c $(SRC) -I .
	ar rc $(NAME) $(OBJ)

copy:
	cp $(NAME) ../

clean:
	rm -f $(OBJ)

fclean: clean
	rm -f ../$(NAME)
	rm -f $(NAME)

re:
	fclean all