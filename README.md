# cowsays-php
An old PHP port of the Perl Cowsay program. It was made in my early dev years and it should stay there as is. I won't merge any pull requests, but you are welcome to fork and play.

I don't remember of the PHP version, all I know now, is that `Function ereg() is deprecated in inc.cowsay.php on line 179`

Have _fun_

## License :
The license is obviously the same as the Cowsays program.

## Usage
Include `inc.cowsays.php` in any PHP file

Call with `cowsay($string, $cowsDir, $thoughts_style='default', $eyes_style='default', $cowFile='default.php' )`

Where :

  - **$string**= The text you want to display
  - **$cowsDir** = the `cows` dir :)
  - **$thoughts_style**= 'default' or 'think'; it's the way the cow expresses itself
  - **$eyes_style**= the eyes of the cow, may be : 'default', 'borg', 'dead', 'greedy', 'paranoid', 'stoned', 'tired', 'wired' or 'young'
  - **cowFile**= the cow itself. May be any PHP file in the `cows` dir.
  
The `test.php` file contain a form to play with the different options.

## Samples :

Simple Cowsay : no options except text

```
/-----------------\
| Good night, s13 |
\-----------------/
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||
```

Dead, thinkinkg cow:


/-----------------\
( Good night, s13 )
\-----------------/
        o   ^__^
         o  (xx)\_______
            (__)\       )\/\
             U  ||----w |
                ||     ||

Beavis :
```
/-----------------\
| Good night, s13 |
\-----------------/
   \         __------~~-,
    \      ,'            ,
          /               \
         /                :
        |                  '
        |                  |
        |                  |
         |   _--           |
         _| =-.     .-.   ||
         o|/o/       _.   |
         /  ~          \ |
       (____\@)  ___~    |
          |_===~~~.`    |
       _______.--~     |
       \________       |
                \      |
              __/-___-- -__
             /            _ \
```
The dragon and the cow
```
/-----------------\
| Good night, s13 |
\-----------------/
                       \                    ^    /^
                        \                  / \  // \
                         \   |\___/|      /   \//  .\
                          \  /O  O  \__  /    //  | \ \           *----*
                            /     /  \/_/    //   |  \  \          \   |
                          \@___\@`    \/_   //    |   \   \         \/\ \
                           0/0/|       \/_ //     |    \    \         \  \
                       0/0/0/0/|        \///      |     \     \       |  |
                    0/0/0/0/0/_|_ /   (  //       |      \     _\     |  /
                 0/0/0/0/0/0/`/,_ _ _/  ) ; -.    |    _ _\.-~       /   /
                             ,-}        _      *-.|.-~-.           .~    ~
            \     \__/        `/\      /                 ~-. _ .-~      /
             \____(oo)           *.   }            {                   /
             (    (--)          .----~-.\        \-`                 .~
             //__\\  \__ Ack!   ///.----..<        \             _ -~
            //    \\               ///-._ _ _ _ _ _ _{^ - - - - ~

```

Dead mutilated cow:
```
/----------------\
| Good night s13 |
\----------------/
       \   \_______
 v__v   \  \   O   )
 (xx)      ||----w |
 (__)      ||     ||  \/\
  U 
```
...
