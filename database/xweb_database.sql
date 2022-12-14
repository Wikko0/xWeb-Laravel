USE [master]
GO
/****** Object:  Database [XWEBMUONLINE]    Script Date: 26.11.2022 г. 11:45:02 ******/
CREATE DATABASE [XWEBMUONLINE]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'XWEBMUONLINE', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\XWEBMUONLINE.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'XWEBMUONLINE_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\XWEBMUONLINE_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [XWEBMUONLINE] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [XWEBMUONLINE].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [XWEBMUONLINE] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET ARITHABORT OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [XWEBMUONLINE] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [XWEBMUONLINE] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET  DISABLE_BROKER 
GO
ALTER DATABASE [XWEBMUONLINE] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [XWEBMUONLINE] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [XWEBMUONLINE] SET  MULTI_USER 
GO
ALTER DATABASE [XWEBMUONLINE] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [XWEBMUONLINE] SET DB_CHAINING OFF 
GO
ALTER DATABASE [XWEBMUONLINE] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [XWEBMUONLINE] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [XWEBMUONLINE] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [XWEBMUONLINE] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [XWEBMUONLINE] SET QUERY_STORE = OFF
GO
USE [XWEBMUONLINE]
GO
/****** Object:  Table [dbo].[XWEB_ADDSTATS]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_ADDSTATS](
	[maxpoints] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_ADMINCP]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_ADMINCP](
	[name] [varchar](50) NULL,
	[sname] [varchar](50) NULL,
	[stitle] [varchar](50) NULL,
	[sdescription] [varchar](50) NULL,
	[skeywords] [varchar](50) NULL,
	[surl] [varchar](max) NULL,
	[sforum] [varchar](max) NULL,
	[sdiscord] [varchar](max) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_ANNOUNCE]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_ANNOUNCE](
	[status] [int] NULL,
	[title] [varchar](50) NULL,
	[date] [smalldatetime] NULL,
	[titlesecond] [varchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_CHAR_INFO]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_CHAR_INFO](
	[name] [varchar](50) NULL,
	[gresets] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_CREDITS]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_CREDITS](
	[name] [varchar](50) NULL,
	[credits] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_DOWNLOAD]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_DOWNLOAD](
	[mb] [int] NULL,
	[version] [varchar](50) NULL,
	[link] [varchar](max) NULL,
	[site] [varchar](50) NULL,
	[name] [varchar](50) NULL,
	[id] [int] IDENTITY(1,1) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_GRANDRESET]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_GRANDRESET](
	[resets] [int] NULL,
	[maxgresets] [int] NULL,
	[level] [int] NULL,
	[zen] [int] NULL,
	[credits] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_HOF]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_HOF](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](255) NULL,
	[class] [varchar](255) NULL,
	[wins] [int] NULL,
	[status] [varchar](50) NULL,
 CONSTRAINT [PK__XWEB_HOF__3213E83F56575044] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_NEWS]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_NEWS](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[date] [varchar](255) NOT NULL,
	[subject] [varchar](255) NULL,
	[news] [varchar](max) NULL,
	[prefix] [varchar](50) NULL,
	[specific] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_RESET]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_RESET](
	[level] [int] NULL,
	[zen] [int] NULL,
	[bkpoints] [int] NULL,
	[smpoints] [int] NULL,
	[elfpoints] [int] NULL,
	[mgpoints] [int] NULL,
	[dlpoints] [int] NULL,
	[sumpoints] [int] NULL,
	[rfpoints] [int] NULL,
	[glpoints] [int] NULL,
	[maxresets] [int] NULL,
	[maxpoints] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[XWEB_SLIDERS]    Script Date: 26.11.2022 г. 11:45:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[XWEB_SLIDERS](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](255) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
INSERT [dbo].[XWEB_ADDSTATS] ([maxpoints]) VALUES (32765)
GO
INSERT [dbo].[XWEB_ADMINCP] ([name], [sname], [stitle], [sdescription], [skeywords], [surl], [sforum], [sdiscord]) VALUES (N'Wikko0', N'xWeb Server', N'xWeb', N'MU Online', N'Mu Online', N'https://127.0.0.1', N'https://127.0.0.1', N'https://discord.com')
GO
INSERT [dbo].[XWEB_ANNOUNCE] ([status], [title], [date], [titlesecond]) VALUES (2, N'Hello world', CAST(N'2022-06-26T20:42:00' AS SmallDateTime), NULL)
GO
INSERT [dbo].[XWEB_CHAR_INFO] ([name], [gresets]) VALUES (N'Wikko0', 2)
GO
INSERT [dbo].[XWEB_CREDITS] ([name], [credits]) VALUES (N'Wikko0', 600)
GO
SET IDENTITY_INSERT [dbo].[XWEB_DOWNLOAD] ON 

INSERT [dbo].[XWEB_DOWNLOAD] ([mb], [version], [link], [site], [name], [id]) VALUES (2, N'lite', N'http://google.bg/', N'mega', N'1', 85)
SET IDENTITY_INSERT [dbo].[XWEB_DOWNLOAD] OFF
GO
INSERT [dbo].[XWEB_GRANDRESET] ([resets], [maxgresets], [level], [zen], [credits]) VALUES (40, 4, 350, 120, 200)
GO
SET IDENTITY_INSERT [dbo].[XWEB_HOF] ON 

INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (1, N'Wikko0', N'Blade Knight', 2, N'Yes')
INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (2, N'SoulMaster', N'Soul Master', 1, N'Yes')
INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (3, N'MuseElf', N'Muse Elf', 1, N'Yes')
INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (4, N'MagicGladiator', N'Magic Gladiator', 1, N'Yes')
INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (5, N'DarkLord', N'Dark Lord', 1, N'Yes')
INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (6, N'Summoner', N'Summoner', 1, N'Yes')
INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (7, N'Rage Fighter', N'Rage Fighter', 1, N'Yes')
INSERT [dbo].[XWEB_HOF] ([id], [name], [class], [wins], [status]) VALUES (8, N'GrowLancer', N'Grow Lancer', 1, N'Yes')
SET IDENTITY_INSERT [dbo].[XWEB_HOF] OFF
GO
SET IDENTITY_INSERT [dbo].[XWEB_NEWS] ON 

INSERT [dbo].[XWEB_NEWS] ([id], [date], [subject], [news], [prefix], [specific]) VALUES (1, N'2022-05', N'XWEB NEWS', N'asdasd', N'HOT', N'news')
SET IDENTITY_INSERT [dbo].[XWEB_NEWS] OFF
GO
INSERT [dbo].[XWEB_RESET] ([level], [zen], [bkpoints], [smpoints], [elfpoints], [mgpoints], [dlpoints], [sumpoints], [rfpoints], [glpoints], [maxresets], [maxpoints]) VALUES (350, 20000000, 350, 350, 350, 350, 350, 350, 350, 420, 40, NULL)
GO
SET IDENTITY_INSERT [dbo].[XWEB_SLIDERS] ON 

INSERT [dbo].[XWEB_SLIDERS] ([id], [name]) VALUES (23, N'slider-img1')
INSERT [dbo].[XWEB_SLIDERS] ([id], [name]) VALUES (25, N'slider-img25')
SET IDENTITY_INSERT [dbo].[XWEB_SLIDERS] OFF
GO
USE [master]
GO
ALTER DATABASE [XWEBMUONLINE] SET  READ_WRITE 
GO
