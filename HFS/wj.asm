1编程计算（（X+Y)*10)+Z)/X，X、Y、Z都是16位无符号数，结果存在RESULT开始的单元
DATA SEGMENT
      RESULT DW 2 DUP(?)
      X DW 2 DUP(?)
      Y DW 2 DUP(?)
      Z DW 2 DUP(?)
DATA END
CODE SEGMENT
ASSUME CS:CODE,DS:DATA
    START :
        MOV AX,DATA
        MOV DS,AX 
        MOV AX,X
        MOV BX,Z
        ADD AX,Y
        ADC DX,0
        MUL 10
        ADD AX,BX
        ADC DX
        MOV BX,X
        DIV  BX
        MOV RESULT AX
        MOV RESULT+2,DX
        MOV AH,4CH
        INT 21H
CODE ENDS
     END START


2、将BUF1开始的100字节传送到BUF2开始的单元，然后从中检索字符“#”，并将此单元换成空格字符。
DATA SEGMENT
      BUF2 DB 100 DUP(?)
DATA ENDS
CODE SEGMENT
      ASSUME CS:CODE,DS:DATA
    START:
	      MOV AX,DATA
	      MOV DS,AX
	      MOV SI,OFFSET BUF1
	      MOV DI,OFFSET BUF2
	      MOV CS,100
	      CLD
	      REP MOVSB
	      MOV DI,LEA BUF2
	      MOV AL,’#’
	      REPNZ SCASB
	      JZ:REPLACE
          JMP:STOP
    REPLACE:
	      DEC DI
	      MOV BL,DI
	      MOV [BL],' '
	      JMP:STOP
    STOP:
	     MOV AH,4CH
	     INT 21H
CODE ENDS
    END START



3、编写一段程序，比较两个5字节的字符串OLDS和NEWS，若相同，在RESULT置0，否则置0FFH。
DATA SEGMENT
     OLDS DB 1,2,3,4,5
     NEWS DB 1,2,3,4,'A'
     N=$-NEWS
     RESULT DB 0
DATA ENDS
CODE SEGMENT
     ASSUME CS:CODE,DS:DATA
     STSRT:
           MOV AX,DATA
           MOV DS,AX
           MOV SI,OFFSET OLDS
           MOV DI,OFFSET NEWS
           MOV CS,N
    COMPAR:
           MOV AL,[SI]
           CMP AL,[DI]
           JNZ NEQ
           INC SI
           INC DI
           LOOP COMPAR
           MOV AL,0
           JMP OUTPUT
    NEQ:
           MOV RESULT,0FFH
    OUTPUT:
           MOV RESULT,AL
           MOV AH,4CH
           INT 21H
CODE ENDS
     END STRAT



4、累加数组中的元素，将和存于SUM开始单元，数据段定义如下
CODE SEGMENT
     ARRAY    DW   10,10,12,4,5,6,7,8,9,10
     COUNT    EQU   $-ARRAY
     SUM      DW   2 DUP(?)
CODE ENDS
CODE SEGMENT
     ASSUME CS:CODE ,DS:DATA
     START:
          MOV AX,DATA
          MOV DS,AX
          MOV SI,OFFSET ARRAY
          MOV CX,COUNT
          MOV BX,0
     ADB:
          ADD BX,[SI]
          ADD SI,2
          LOOP ADB
          MOV SI,OFFSET SUM
          MOV [SI],BX
          MOV AH,4CH
          INT 21H
CODE ENDS
     END STRAT

5、编写程序完成求1＋2＋3＋……N的累加和，直到累加和超过1000为止。统计被累加的自然数的个数送CN单元，累加和送SUM。
CODE SEGMENT
     SUM DW ?
     CN  DW ?
CODE ENDS
CODE SEGMENT
     ASSUME CS:CODE ,DS:DATA
     START:
          MOV AX,DATA
          MOV DS,AX
          MOV DX,1
          MOV AX,0
          MOV CX,0
     ADDSUM:
          ADD AX,DX
          INC CX
          CMP AX,1000
          JA  OK
          INC DX
          JMP ADDSUM
     OK:
          MOV SI,OFFSET CN
          MOV [SI],CX
          MOV DI,OFFSET SUM
          MOV [DI],AX
          MOV AH,4CH
          INT 21H
CODE ENDS
     END STRAT


6、从给定串中寻找最大值，并放到MAX单元，元素放在BUFFER开始的字节单元中。
CODE SEGMENT
     BUFFER    DB   10,32,56,11,90,56,89,21
     N		   EQU	$-BUFFER
     MAX       DB    ?
CODE ENDS
CODE SEGMENT
     ASSUME CS:CODE,DS:DATA
     START:
          MOV AX,DATA
          MOV DS,AX
          MOV SI,OFFSET BUFFER
          MOV AL,[SI]
          MOV CX,N-1
     CMP:
          INC SI
          CMP AL,[SI]
          JAE CMP2
          MOV AL,[SI]
     CMP2:
          DEC CX
          JNZ CMP
          MOV SI,OFFSET BUFFER
          MOV [SI],AL
          MOV AH,4CH
          INT 21H
CODE ENDS
     END STRAT


7、把BUF表中的字节元素按值的大小升序排列。数据段定义如下：
 BUF        DB   10,32,56,11,90,56,89,21
 N		    EQU	 $-BUF



DATA   SEGMENT
       BUF  DB   10,32,56,11,90,56,89,21
       N	EQU	$-BUF
DATA   ENDS
CODE   SEGMENT
       ASSUME  CS:CODE,DS:DATA
    START:
       MOV AX,DATA
       MOV DS,AX
       MOV CX,N-1
    START2:
       MOV SI,OFFSET BUF
       MOV DX,CX
       MOV BL,0
    CMP1:
       MOV AL,[SI]
       CMP AL,[SI+1]
       JG  XCHG
       INC SI
       LOOP CMP1
       JMP  CMP2
    XCHG:
       XCHG [SI+1],AL
       XCHG [SI],AL
       MOV  BL,OFFH
       JMP  CMP1
       DEC DX
       JNZ CMP2
    CMP2:
       CMP BL,0
       JNE START2
       MOV AH,4CH
       INT 21H
CODE   ENDS
       END START


8、类型号为20H的中断服务程序入口符号地址为INT-5，试写出中断向量的装入程序片断。
CLI
PUSH DS
PUSH AX
PUSH DS
PUSH AX
XOR  AX，AX
MOV  DS，AX
MOV  AX,OFFSET  INT-5
MOV  WORD  PTR  [080H],AX
MOV  AX,SEG     INT-5
MOV  WORD  PTR  [082H],AX
POP  AX
POP  DS
STI


9、设一个8253的计数器0产生周期为20ms的定时信号，计数器1产生周期为100ms的定时信号。设外部时钟频率为f=2MHZ，端口地址为330H~333H。试对它进行初始化编程。
MOV AX,00110100
MOV DX,333H
OUT DX,AX
MOV AX,40000
MOV DX,330H
OUT DX,AL
MOV AL,AH
OUT DX,AL

MOV AX,01110100
MOV DX,333H
OUT DX,AX
MOV AX,5
MOV DX,331H
OUT DX,AL
MOV AL,AH
OUT DX,AL

10、已知某8253占用I/O空间地址为40H~43H，设定时器0、定时器1工作于方式3，外部提供一个时钟，频率f=2MHZ。要求定时器1连续产生5ms的定时信号，定时器0连续产生5秒的定时信号。
MOV AX,01110110
OUT 43H,AX
MOV AX,10000
OUT 41H,AL
MOV AL,AH
OUT 41H,AL

MOV AX,00110110
OUT 43H,AX
MOV AX,1000
OUT 41H,AL
MOV AL,AH
OUT 41H,AL



11、用8255A控制三个发光二极管依秩序循环显示。假设开关闭合时，点亮发光二极管，开关断开时息灭二极管。（1）画出原理图，并说明工作原理；（2）选择8255工作方式；（3）编写8255初始化程序与控制程序。
见课本P226



12、8255连接一组开关与一组LED显示器，如图所示。开关状态用LED显示，若闭合，则点亮。8255端口地址为310H~313H。（1）选择8255工作方式；编写8255初始化程序与控制程序。
见课本P233
